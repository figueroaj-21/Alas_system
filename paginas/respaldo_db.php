<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Respaldo de Base de Datos</title>

  <!-- Enlace a Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>

  <?php require "../html/nav2.html"; ?>

  <br>

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-lg-6">
        <h1 class="text-center mb-4">Respaldo de Base de Datos</h1>
        <form action="../php/respaldo.php" method="post">
          <div class="mb-3">
            <label for="nombre_archivo" class="form-label">Nombre del archivo:</label>
            <input type="text" name="nombre_archivo" id="nombre_archivo" class="form-control" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Respaldar y Descargar</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Enlace a Bootstrap JS y Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>
    