<?php
require "../php/conexion.php";

// Obtener el rango de fechas del formulario
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];

// Consulta para obtener los registros de la tabla tbl_salida en el rango de fechas seleccionado
$sql_reporte = "SELECT * FROM tbl_salida 
                WHERE fecha_salida BETWEEN '$fecha_inicio' AND '$fecha_fin'";

$resultado = mysqli_query($conexion, $sql_reporte);

// Verificar si se obtuvieron resultados
if (mysqli_num_rows($resultado) > 0) {
  // Mostrar el reporte en una tabla
  echo "<table>
          <tr>
            <th>ID Salida</th>
            <th>Fecha Salida</th>
            <th>Cantidad Salida</th>
            <th>ID Producto</th>
          </tr>";
  
  while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>
            <td>" . $fila['id_salida'] . "</td>
            <td>" . $fila['fecha_salida'] . "</td>
            <td>" . $fila['cantidad_salida'] . "</td>
            <td>" . $fila['id_producto'] . "</td>
          </tr>";
  }
  
  echo "</table>";
} else {
  echo "No se encontraron resultados para el rango de fechas seleccionado.";
}

// Cerrar la conexión
mysqli_close($conexion);
?>
