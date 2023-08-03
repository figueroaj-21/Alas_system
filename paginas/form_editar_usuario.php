<?php
require "../html/nav2.html";
require "../php/conexion.php";

// Verificar si se ha enviado un ID de usuario válido desde otra página
if (isset($_GET['id_usuario']) && is_numeric($_GET['id_usuario'])) {
    $id_usuario = $_GET['id_usuario'];

    // Consulta para obtener los datos del usuario por su ID
    $sql = "SELECT login_usuario, cedula_usuario, nombre_usuario, apellido_usuario, correo_usuario, direccion_usuario FROM tbl_usuarios WHERE id_usuario = $id_usuario";
    $resultado = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($resultado) > 0) {
        $row = mysqli_fetch_assoc($resultado);
        $login_usuario = $row['login_usuario'];
        $cedula_usuario = $row['cedula_usuario'];
        $nombre_usuario = $row['nombre_usuario'];
        $apellido_usuario = $row['apellido_usuario'];
        $correo_usuario = $row['correo_usuario'];
        $direccion_usuario = $row['direccion_usuario'];
    } else {
        // Si no se encontró el usuario, redireccionar a la página de consulta de usuarios o mostrar un mensaje de error
        header("Location: consulta_usuarios.php");
        exit();
    }
} else {
    // Si no se proporcionó un ID de usuario válido, redireccionar a la página de consulta de usuarios o mostrar un mensaje de error
    header("Location: consulta_usuarios.php");
    exit();
}
?>

<!doctype html>
<html lang="es">
<head>
  <title>Editar Usuario</title>
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
  <h2>Editar Usuario</h2>
  <form class="needs-validation" novalidate action="../php/editar_usuario.php" method="POST">
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
    <div class="form-group">
      <label for="login_usuario">Login de Usuario:</label>
      <input type="text" class="form-control" required id="login_usuario" name="login_usuario" value="<?php echo $login_usuario; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un nombre de usuario
      </div>
    </div>
    <div class="form-group">
      <label for="cedula_usuario">Cédula</label>
      <input type="text" class="form-control" required id="cedula_usuario" name="cedula_usuario" value="<?php echo $cedula_usuario; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar su cédula
      </div>
    </div>
    <div class="form-group">
      <label for="nombre_usuario">Nombre:</label>
      <input type="text" class="form-control" required id="nombre_usuario" name="nombre_usuario" value="<?php echo $nombre_usuario; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un Nombre
      </div>
    </div>
    <div class="form-group">
      <label for="apellido_usuario">Apellido:</label>
      <input type="text" class="form-control" required id="apellido_usuario" name="apellido_usuario" value="<?php echo $apellido_usuario; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un Apellido
      </div>
    </div>
    <div class="form-group">
      <label for="correo_usuario">Correo electrónico:</label>
      <input type="email" class="form-control" required id="correo_usuario" name="correo_usuario" value="<?php echo $correo_usuario; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar un Correo
      </div>
    </div>
    <div class="form-group">
      <label for="direccion_usuario">Dirección:</label>
      <input type="text" class="form-control" required id="direccion_usuario" name="direccion_usuario" value="<?php echo $direccion_usuario; ?>">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar la dirección
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

