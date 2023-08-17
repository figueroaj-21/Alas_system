<?php require "../php/seguridad.php"; 

require "../php/conexion.php";
$nombre_usuario = $_SESSION['nombre_usuario'];
$apellido_usuario = $_SESSION['apellido_usuario'];
$login_usuario = $_SESSION['login_usuario'];
$nivel_usuario = $_SESSION['nivel_usuario'];

require "../html/nav2.html";

// Verificar si se ha enviado un ID de proveedor válido desde otra página
if (isset($_GET['id_proveedor']) && is_numeric($_GET['id_proveedor'])) {
    $id_proveedor = $_GET['id_proveedor'];

    // Consulta para obtener los datos del proveedor por su ID
    $sql = "SELECT rif_proveedor, nombre_proveedor, numero_contacto, persona_contacto, correo_proveedor
    FROM tbl_proveedores WHERE id_proveedor = $id_proveedor";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $rif_proveedor = $row['rif_proveedor'];
        $nombre_proveedor = $row['nombre_proveedor'];
        $numero_contacto = $row['numero_contacto'];
        $persona_contacto = $row['persona_contacto'];
        $correo_proveedor = $row['correo_proveedor'];
    } else {
        // Si no se encontró el proveedor, redireccionar a la página de consulta de proveedores o mostrar un mensaje de error
        header("Location: consulta_proveedores.php");
        exit();
    }
} else {
    // Si no se proporcionó un ID de proveedor válido, redireccionar a la página de consulta de proveedores o mostrar un mensaje de error
    header("Location: consulta_proveedores.php");
    exit();
}
?>

<!doctype html>
<html lang="es">
<head>
  <title>Editar Proveedor</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
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
  <h2>Editar Proveedor</h2>
  <form class="needs-validation" novalidate action="../php/editar_proveedor.php" method="POST">
    <input type="hidden" name="id_proveedor" value="<?php echo $id_proveedor; ?>">
    <div class="form-group">
      <label for="rif_proveedor">Rif del Proveedor:</label>
      <input type="text" class="form-control" required id="rif_proveedor" name="rif_proveedor" value="<?php echo $rif_proveedor; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un Rif
      </div>
    </div>
    <div class="form-group">
      <label for="nombre_proveedor">Nombre:</label>
      <input type="text" class="form-control" required id="nombre_proveedor" name="nombre_proveedor" value="<?php echo $nombre_proveedor; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar el nombre del proveedor
      </div>
    </div>
    <div class="form-group">
      <label for="numero_contacto">Numero de contacto:</label>
      <input type="text" class="form-control" required id="numero_contacto" name="numero_contacto" value="<?php echo $numero_contacto; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un número de contacto
      </div>
    </div>
    <div class="form-group">
      <label for="persona_contacto">Persona de Contacto:</label>
      <input type="text" class="form-control" required id="persona_contacto" name="persona_contacto" value="<?php echo $persona_contacto; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar una persona de contacto
      </div>
    </div>
    <div class="form-group">
      <label for="correo_proveedor">Correo electrónico:</label>
      <input type="email" class="form-control" required id="correo_proveedor" name="correo_proveedor" value="<?php echo $correo_proveedor; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un Correo
      </div>
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    <a href="consulta_usuarios.php" class="btn btn-secondary">Cancelar</a>
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

