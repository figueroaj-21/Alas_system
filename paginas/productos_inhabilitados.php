<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
  
/**
 * connect_struct_consulta_basedatos.php
 *
 * 1. Establece conexión a un gestor de bases de datos
 * 2. Estructura una consulta SQL
 * 3. Ejecuta la consulta
 * 4. Obtiene el total de registros devueltos
 * 5. Muestra los registros devueltos por la consulta
 * 6. Libera la memoria utilizada
 * 7. Cierra la conexión al gestor de bases de datos
 */

// 1. Establece conexión a un gestor de bases de datos MySQL


// 2. Estructura una consulta SQL
//    Muestra las facturas y sus clientes, ordenadas por número de factura, en orden descendente
$sql_facturas = "SELECT p.id_producto, p.codigo, c.clasificacion, p.descripcion, p.observaciones, p.costo, p.existencia, p.stock_minimo, pr.id_proveedor, pr.nombre_proveedor FROM tbl_productos p JOIN tbl_clasificacion c ON p.id_clasificacion = c.id_clasificacion JOIN tbl_proveedores pr ON p.id_proveedor = pr.id_proveedor WHERE estado_producto = 0";
//

// 3. Ejecuta la consulta y almacena el resultado devuelto en la variable $rcs_facturas
$rcs_facturas = mysqli_query($conexion, $sql_facturas) or die("Error al consultar facturas: " . mysqli_error($conexion));

// 4. Obtiene la cantidad de registros devueltos
$num_reg = mysqli_num_rows($rcs_facturas);

/* 5. Muestra los registros devueltos por la consulta */

// 5.1 Evalúa el total de registros devueltos
//     Asigna a la variable $muestra_tabla el valor devuelto al evaluar la condición
//     Utiliza un Operador Ternario
$muestra_tabla = ($num_reg > 0) ? true : false;
?>
<!doctype html>
<html lang="es">
<head>
  <title>Productos Ihabilitados</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
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

    <!-- Invoca y Traduce al metodo DataTable() -->
    <script>
      $(function () {
        $("#tbl_usuarios").DataTable({
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

 <div class="container">
      <div class="col-md-12 col-md-offset-2">
        <h1>Productos Inhabilitados</h1>
        <br>
        <a href="../reportes/reporte_productos_inhabilitados.php" target="_blank" class="btn btn-danger">PDF
        <i class="fa-solid fa-file-lines"></i></a>
        <hr>

        <table
          id="tbl_usuarios"
          class="table table-striped table-hover dt-responsive nowrap display"
          style="width: 100%"
        >
          <thead>
            <tr>
              <th>ID</th>
              <th>Codigo</th>
              <th>Clasificacion</th>
              <th>Descripcion</th>
              <th>Observaciones</th>
              <th>Costo</th>
              <th>Exitencia</th>
              <th>Stock Mínimo</th>
              <th>Proveedor</th>
              <th>Acciones</th>
            </tr>
          </thead>

          <tfoot>
            <tr>
              <th>ID</th>
              <th>Codigo</th>
              <th>Clasificacion</th>
              <th>Descripcion</th>
              <th>Observaciones</th>
              <th>Costo</th>
              <th>Existencia</th>
              <th>Stock Mínimo</th>
              <th>Proveedor</th>
              <th>Acciones</th>
            </tr>
          </tfoot>

          <tbody>

          <?php
                    $i = 1;
                    while($row_factura = mysqli_fetch_array($rcs_facturas, MYSQLI_ASSOC)) {
                    ?>
                        <tr>
                            <td class=""><?php echo $row_factura['id_producto']; ?></td>
                            <td class=""><?php echo $row_factura['codigo']; ?></td>
                            <td class=""><?php echo $row_factura['clasificacion']; ?></td>
                            <td class=""><?php echo $row_factura['descripcion']; ?></td>
                            <td class=""><?php echo $row_factura['observaciones']; ?></td>
                            <td class=""><?php echo $row_factura['costo']; ?></td>
                            <td class=""><?php echo $row_factura['existencia']; ?></td>
                            <td class=""><?php echo $row_factura['stock_minimo']; ?></td>
                            <td class=""><?php echo $row_factura['nombre_proveedor']; ?></td>
                            <td class=""><!-- Enlace para abrir el modal de modal_entrada.html -->
                            <a class="btn btn-outline-dark" href="#" title="Habilitar el registro <?php echo $row_factura["descripcion"]; ?>" onclick="inhabilitarProducto(<?php echo $row_factura['id_producto']; ?>)">
                            <i class="fa-solid fa-ban"></i>
                            </a> 
                        	</td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>

          </tbody>
        </table>
      </div>
    </div>

<script>
function inhabilitarProducto(idProducto) {
  // Realizar una solicitud AJAX a un archivo PHP para habilitar/inhabilitar el registro

  const url = "../php/inhabilitar_producto.php?id_producto=" + idProducto;
  
  // Realizar la solicitud AJAX
  fetch(url, { method: "POST" })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        // Si la operación fue exitosa, puedes realizar alguna acción aquí, como recargar la tabla de productos
        if (data.estado == 1) {
          alert("Producto Inhabilitado correctamente.");
        } else {
          alert("Producto Habilitado correctamente.");
        }
        window.location.reload(); // Recarga la página para reflejar los cambios
      } else {
        // Si la operación falló, muestra un mensaje de error
        alert("Error al cambiar el estado del producto. Inténtalo de nuevo más tarde.");
      }
    })
    .catch(error => {
      console.error("Error al realizar la solicitud AJAX: ", error);
      alert("Ha ocurrido un error inesperado. Inténtalo de nuevo más tarde.");
    });
}
</script>

</body>
</html>