<!doctype html>
<html lang="es">
<head>
  <title>Salidas Por Periodos</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Botones -->
    <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>
     <script src="./jQuery-3.3.1/jquery-3.3.1.min.js"></script>

    <!-- Enlaces a Bootstrap 4 -->
        <script src="./Bootstrap-4-4.1.1/js/bootstrap.min.js"></script>

    <!-- Enlace a Bootstrap web-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Enlaces a DataTables CSS y JS -->
    <link rel="stylesheet" href="./datatables.min.css" />
    <script src="./datatables.min.js"></script>

</head>
<body> 
<!-- formulario_reporte.php -->
<form action="../php/reporte_salidas_periodos.php" method="post">
  <label for="fecha_inicio">Fecha de inicio:</label>
  <input type="date" name="fecha_inicio" required>
  
  <label for="fecha_fin">Fecha de fin:</label>
  <input type="date" name="fecha_fin" required>
  
  <button type="submit">Generar Reporte</button>
</form>

</body>
</html>