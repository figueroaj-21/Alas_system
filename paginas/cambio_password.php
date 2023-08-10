<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
  $id_usuario = $_SESSION['id_usuario'];
  
?>
<!doctype html>
<html lang="es">
<head>
  <title>Cambio de Contraseña</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Botones -->
    <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>


    <!-- Enlace a Bootstrap web-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>
<body>

  <?php require "../html/nav2.html"; ?>
  <br>
  <br>
  <br>
<div class="container">
  <h2>Cambiar Contraseña</h2>
  <form class="needs-validation" novalidate action="../php/procesar_cambio_password.php" method="POST">
    <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
    <div class="form-group">
      <label for="login_usuario">Login de Usuario:</label>
      <input type="text" class="form-control" required id="login_usuario" name="login_usuario" value="<?php echo $login_usuario; ?>" readonly>
    </div>
    <div class="form-group">
      <label for="password_actual">Contraseña Actual</label>
      <input type="password" class="form-control" required id="password_actual" name="password_actual">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar la contraseña actual
      </div>
    </div>
    <div class="form-group">
      <label for="nuevo_password">Nueva Contraseña</label>
      <input type="password" class="form-control" required id="nuevo_password" name="nuevo_password">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar su nueva contraseña
      </div>
    </div>
    <div class="form-group">
      <label for="confirmar_password">Confirmar Contraseña</label>
      <input type="password" class="form-control" required id="confirmar_password" name="confirmar_password">
      <div class="valid-feedback">
        Ok.
      </div>
      <div class="invalid-feedback">
        Debe Ingresar confirmar su nueva contraseña
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

</body>
</html>