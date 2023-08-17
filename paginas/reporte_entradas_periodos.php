<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
  
// Obtener el rango de fechas del formulario
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

// Consulta para obtener los registros de la tabla tbl_entrada en el rango de fechas seleccionado
$sql_reporte = "SELECT e.id_entrada, e.fecha_entrada, e.cantidad_entrada, e.factura_compra, e.id_producto, p.descripcion FROM tbl_entrada e 
   JOIN tbl_productos p ON e.id_producto = p.id_producto 
   WHERE e.fecha_entrada BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$resultado = mysqli_query($conexion, $sql_reporte);

// Cerrar la conexión
mysqli_close($conexion);
?>


?>
<!doctype html>
<html lang="es">
<head>
  <title>Home</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Botones -->
    <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>


    <!-- Enlace a Bootstrap web-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <!-- Enlaces a DataTables CSS y JS -->
    <link rel="stylesheet" href="./datatables.min.css" />
    <script src="./datatables.min.js"></script>

    <!-- Invoca y Traduce al metodo DataTable() -->
    <script>
      $(function () {
        $("#reporteEntradasPeriodos").DataTable({
          language: {
            sProcessing: "Procesando...",
            sLengthMenu: "Mostrar _MENU_ registros",
            sZeroRecords: "No se encontraron resultados",
            sEmptyTable: "Ningún dato disponible en esta tabla =(",
            sInfo:
              "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            sInfoEmpty:
              "Mostrando registros del 0 al 0 de un total de 0 registros",
            sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
            sInfoPostFix: "",
            sSearch: "Buscar:",
            sUrl: "",
            sInfoThousands: ",",
            sLoadingRecords: "Cargando...",
            oPaginate: {
              sFirst: "Primero",
              sLast: "Último",
              sNext: "Siguiente",
              sPrevious: "Anterior",
            },
            oAria: {
              sSortAscending:
                ": Activar para ordenar la columna de manera ascendente",
              sSortDescending:
                ": Activar para ordenar la columna de manera descendente",
            },
            buttons: {
              copy: "Copiar",
              colvis: "Visibilidad",
            },
            decimal: ",",
            thousands: ".",
          },
          lengthMenu: [
            [10, 20, 30, 50, -1],
            [10, 20, 30, 50, "Todos"],
          ],
        });
      });
    </script>

    <style>
      div.container {
        margin-top: 80px;
        max-width: 1200px;
      }
    </style>
</head>
<body>

  <?php require "../html/nav2.html"; ?>
<br>
  <div class="container mt-5">
    <h2>Reporte de Entradas por Periodo</h2>
    <br>
    <a  href="../reportes/reporte_entradas_por_periodo.php?fecha_inicio=<?php echo urlencode($fecha_inicio); ?>&fecha_fin=<?php echo urlencode($fecha_fin); ?>" target="_blank" class="btn btn-danger">PDF
      <i class="fa-solid fa-file-lines"></i>
    </a>
    
    <hr>
    <?php if (mysqli_num_rows($resultado) > 0) { ?>
      <table id="reporteEntradasPeriodos" class="table table-striped table-hover dt-responsive nowrap display">

        <thead>
          <tr>
            <th>ID Entrada</th>
            <th>Fecha Entrada</th>
            <th>Cantidad Entrada</th>
            <th>Descripción</th>
            <th>Número de Factura</th>
          </tr>
        </thead>

        <tfoot>
          <tr>
            <th>ID Entrada</th>
            <th>Fecha Entrada</th>
            <th>Cantidad Entrada</th>
            <th>Descripción</th>
            <th>Número de Factura</th>
          </tr>
        </tfoot>

        <tbody>
          <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
            <tr>
              <td><?php echo $fila['id_entrada']; ?></td>
              <td><?php echo $fila['fecha_entrada']; ?></td>
              <td><?php echo $fila['cantidad_entrada']; ?></td>
              <td><?php echo $fila['descripcion']; ?></td>
              <td><?php echo $fila['factura_compra']; ?></td>
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