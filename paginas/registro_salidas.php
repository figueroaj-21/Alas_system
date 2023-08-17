<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
?>

<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Salidas</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

  <?php require "../html/nav2.html"; ?>
  <br>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <h2>Registrar Salida</h2>
        <form class="needs-validation" novalidate action="../php/verificar_stock.php" method="GET">
          <?php
          // Incluye el archivo de conexión
          require_once '../php/conexion.php';

          // Obtiene el id_producto desde el método GET
          $id_producto = isset($_GET['id_producto']) ? $_GET['id_producto'] : 0;
          $descripcion = isset($_GET['descripcion']) ? $_GET['descripcion'] : 0;

          // Consulta para obtener el registro de la base de datos
          $sql = "SELECT p.id_producto, p.codigo, p.descripcion, p.existencia, p.id_proveedor, pr.nombre_proveedor 
                  FROM tbl_productos p
                  JOIN tbl_proveedores pr ON p.id_proveedor = pr.id_proveedor
                  WHERE p.id_producto = $id_producto";

          // Ejecuta la consulta
          $result = mysqli_query($conexion, $sql);

          // Verifica si se encontró el registro
          if (mysqli_num_rows($result) > 0) {
              $row = mysqli_fetch_assoc($result);
              ?>

              <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
              </div>
              <div class="mb-3">
                <label for="codigo" class="form-label">Codigo</label>
                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $row['descripcion']; ?>" readonly>
              </div>
              <div class="mb-3">
                <label for="fecha_salida" class="form-label">Fecha de Salida</label>
                <input type="date" class="form-control" required id="fecha_salida" name="fecha_salida">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar una Fecha.
                </div>
              </div>
              <div class="mb-3">
                <label for="cantidad_salida" class="form-label">Salida (Cantidad)</label>
                <input type="text" class="form-control" required id="cantidad_salida" name="cantidad_salida">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar la Cantidad de Salida.
                </div>
              </div>
              <div class="mb-3">
                <label for="factura_venta" class="form-label">Orden de Salida</label>
                <input type="text" class="form-control" required id="factura_venta" name="factura_venta">
                <div class="valid-feedback">
                  Ok.
                </div>
                <div class="invalid-feedback">
                  Debe Ingresar una Orden.
                </div>
              </div>

              <?php
          } else {
              // Si no se encontró el registro, muestra un mensaje o realiza alguna otra acción
              echo 'No se encontró el producto.';
          }
          ?>
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
  </div>
    </div>
      </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

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

</body>
</html>