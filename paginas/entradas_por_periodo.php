<?php
require "../php/seguridad.php";  
require "../php/conexion.php";
$nombre_usuario = $_SESSION['nombre_usuario'];
$apellido_usuario = $_SESSION['apellido_usuario'];
$login_usuario = $_SESSION['login_usuario'];
$nivel_usuario = $_SESSION['nivel_usuario'];
?>
<!doctype html>
<html lang="es">
<head>
  <title>Entradas Por Periodos</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Enlaces a Bootstrap web-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Enlaces a DataTables CSS y JS -->
  <link rel="stylesheet" href="./datatables.min.css" />
  <script src="./datatables.min.js"></script>

</head>
<body> 
  <?php require "../html/nav2.html"; ?>
  <br>
  <!-- Centrar el formulario -->
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <!-- Formulario -->
        <div class="text-center">
          <h2 class="mb-4">Entradas Por Periodo</h2>
        </div>
        <form action="./reporte_entradas_periodos.php" method="post">
          <div class="mb-3">
            <label for="fecha_inicio" class="form-label">Fecha de inicio:</label>
            <input type="date" name="fecha_inicio" class="form-control" required>
          </div>
          
          <div class="mb-3">
            <label for="fecha_fin" class="form-label">Fecha de fin:</label>
            <input type="date" name="fecha_fin" class="form-control" required>
          </div>
          
          <button type="submit" class="btn btn-primary btn-block">Generar Reporte</button>
        </form>
        <!-- Fin del formulario -->
      </div>
    </div>
  </div>

  <!-- Scripts de Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
