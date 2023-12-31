<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
  
// Obtener el rango de fechas del formulario
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

// Consulta para obtener los registros de la tabla tbl_salida en el rango de fechas seleccionado
$sql_reporte = "SELECT e.id_salida, e.fecha_salida, e.cantidad_salida, e.factura_venta, e.id_producto, p.descripcion FROM tbl_salida e 
   JOIN tbl_productos p ON e.id_producto = p.id_producto 
   WHERE e.fecha_salida BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$resultado = mysqli_query($conexion, $sql_reporte);

// Cerrar la conexión
mysqli_close($conexion);

?>
<!doctype html>
<html lang="es">
<head>
  <title>Reporte de salidas por periodo</title>
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
  <div class="container mt-5">
    <h2>Reporte de Salidas por Periodo</h2>
    <br>
    <a  href="../reportes/reporte_salidas_por_periodo.php?fecha_inicio=<?php echo urlencode($fecha_inicio); ?>&fecha_fin=<?php echo urlencode($fecha_fin); ?>" target="_blank" class="btn btn-danger">PDF
      <i class="fa-solid fa-file-lines"></i>
    </a>
    <hr>
    <?php if (mysqli_num_rows($resultado) > 0) { ?>
      <table id="reporteSalidasPeriodos" class="table table-striped table-hover dt-responsive nowrap display">

        <thead>
          <tr>
            <th>ID Salida</th>
            <th>Fecha Salida</th>
            <th>Cantidad Salida</th>
            <th>Descripción</th>
            <th>Número de Factura</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>ID Salida</th>
            <th>Fecha Salida</th>
            <th>Cantidad Salida</th>
            <th>Descripción</th>
            <th>Número de Factura</th>
          </tr>
        </tfoot>

        <tbody>
          <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo $fila['id_salida']; ?></td>
              <td><?php echo $fila['fecha_salida']; ?></td>
              <td><?php echo $fila['cantidad_salida']; ?></td>
              <td><?php echo $fila['descripcion']; ?></td>
              <td><?php echo $fila['factura_venta']; ?></td>

            </tr>
          <?php } ?>
        </tbody>
      </table>
    <?php } else { ?>
      <div class="alert alert-warning" role="alert">
        No se encontraron resultados para el rango de fechas seleccionado.
      </div>
    <?php } ?>
  </div>

</body>
</html>