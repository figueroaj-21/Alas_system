<?php
require "../html/nav2.html";
require "../php/conexion.php";

// Verificar si se ha enviado un ID de producto válido desde otra página
if (isset($_GET['id_producto']) && is_numeric($_GET['id_producto'])) {
    $id_producto = $_GET['id_producto'];

    // Consulta para obtener los datos del producto por su ID
    $sql = "SELECT p.codigo, p.descripcion, p.costo, p.existencia, p.observaciones, c.clasificacion, pr.nombre_proveedor
        FROM tbl_productos p
        INNER JOIN tbl_clasificacion c ON p.id_clasificacion = c.id_clasificacion
        INNER JOIN tbl_proveedores pr ON p.id_proveedor = pr.id_proveedor
        WHERE p.id_producto = $id_producto";

    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $codigo = $row['codigo'];
        $descripcion = $row['descripcion'];
        $costo = $row['costo'];
        $existencia = $row['existencia'];
        $observaciones = $row['observaciones'];
        $clasificacion = $row['clasificacion'];
        $nombre_proveedor = $row['nombre_proveedor'];
    } else {
        // Si no se encontró el producto, redireccionar a la página de consulta de productos o mostrar un mensaje de error
        header("Location: consulta_productos.php");
        exit();
    }
} else {
    // Si no se proporcionó un ID de producto válido, redireccionar a la página de consulta de productos o mostrar un mensaje de error
    header("Location: consulta_productos.php");
    exit();
}
?>

<!doctype html>
<html lang="es">
<head>
  <title>Editar Producto</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Enlaces a Bootstrap 4 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Estilos adicionales -->
  <style>
    .container {
      max-width: 500px;
      margin-top: 80px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2>Editar Producto</h2>
  <form class="needs-validation" novalidate action="../php/editar_producto.php" method="POST">
    <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
    <div class="form-group">
      <label for="codigo">Código:</label>
      <input type="text" class="form-control" required id="codigo" name="codigo" value="<?php echo $codigo; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un código
      </div>
    </div>
    <div class="form-group">
      <label for="descripcion">Descripción:</label>
      <input type="text" class="form-control" required id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar una descripción
      </div>
    </div>
    <div class="form-group">
      <label for="costo">Costo:</label>
      <input type="number" class="form-control" required id="costo" name="costo" value="<?php echo $costo; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un costo válido
      </div>
    </div>
    <div class="form-group">
      <label for="existencia">Existencia:</label>
      <input type="number" class="form-control" required id="existencia" name="existencia" value="<?php echo $existencia; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar existencia
      </div>
    </div>
    <div class="form-group">
      <label for="observaciones">Observaciones:</label>
      <textarea class="form-control" id="observaciones" name="observaciones"><?php echo $observaciones; ?></textarea>
    </div>
   <div class="form-group">
    <label for="clasificacion">Clasificación:</label>
    <select class="form-control" required name="id_clasificacion" id="id_clasificacion">
        <?php

        // Consulta para obtener los registros de la base de datos
        $sql = "SELECT id_clasificacion, clasificacion FROM tbl_clasificacion";

        // Ejecuta la consulta
        $result = mysqli_query($conexion, $sql);

        // Verifica si hay registros y crea las opciones
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Verifica si el valor de id_clasificacion coincide con el valor actual de la iteración
                $selected = ($clasificacion == $row['clasificacion']) ? 'selected' : '';

                // Agrega el atributo 'selected' si corresponde
                echo '<option value="' . $row['id_clasificacion'] . '" ' . $selected . '>' . $row['clasificacion'] . '</option>';
            }
        } else {
            echo '<option value="">No hay registros disponibles</option>';
        }
        ?>
        </select>
        <div class="valid-feedback">
            Ok.
        </div>
        <div class="invalid-feedback">
            Debe Ingresar una clasificación válida
        </div>
      </div>
    <div class="form-group">
    <label for="nombre_proveedor">Proveedor:</label>
    <select class="form-control" required name="id_proveedor" id="id_proveedor">
        <?php

        // Consulta para obtener los registros de la base de datos
        $sql = "SELECT id_proveedor, nombre_proveedor FROM tbl_proveedores";

        // Ejecuta la consulta
        $result = mysqli_query($conexion, $sql);

        // Verifica si hay registros y crea las opciones
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Verifica si el valor de id_proveedor coincide con el valor actual de la iteración
                $selected = ($nombre_proveedor == $row['nombre_proveedor']) ? 'selected' : '';

                // Agrega el atributo 'selected' si corresponde
                echo '<option value="' . $row['id_proveedor'] . '" ' . $selected . '>' . $row['nombre_proveedor'] . '</option>';
            }
        } else {
            echo '<option value="">No hay registros disponibles</option>';
        }
        ?>
    </select>
    <div class="valid-feedback">
        Ok.
    </div>
    <div class="invalid-feedback">
        Debe Ingresar un proveedor válido
    </div>
</div>



    <br>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="consulta_productos.php" class="btn btn-secondary">Cancelar</a>
  </form>
</div>

<script>

// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
  'use strict'

  // Fetch all the forms we want to apply custom Bootstrap validation styles to
  const forms = document.querySelectorAll('.needs-validation')

  // Loop over them and prevent submission
  Array.from(forms).forEach(form => {
    form.addEventListener('submit', event => {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()

</script>

<!-- Enlaces a Bootstrap 4 JS y jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>


