<?php
require "../php/conexion.php";

// Obtener los datos del producto desde $_GET
$fecha_salida = $_GET['fecha_salida'];
$cantidad_salida = $_GET['cantidad_salida'];
$id_producto = $_GET['id_producto'];
$motivo_salida = $_GET['motivo_salida'];
$descripcion = $_GET['descripcion'];

// Consulta para obtener el stock mínimo del producto
$sql_stock_minimo = "SELECT stock_minimo, existencia FROM tbl_productos WHERE id_producto = ?";
$stmt_stock_minimo = mysqli_prepare($conexion, $sql_stock_minimo);
mysqli_stmt_bind_param($stmt_stock_minimo, "d", $id_producto);
mysqli_stmt_execute($stmt_stock_minimo);
mysqli_stmt_bind_result($stmt_stock_minimo, $stock_minimo, $existencia_actual);
mysqli_stmt_fetch($stmt_stock_minimo);
mysqli_stmt_close($stmt_stock_minimo);

// Verificar si la cantidad de salida supera el stock mínimo
if ($existencia_actual - $cantidad_salida < $stock_minimo) {
    echo '<script>
            var confirmacion = confirm("La cantidad de salida supera el stock mínimo. ¿Está seguro de realizar la salida del producto?");
            if (confirmacion) {
                window.location.href = "procesar_salida.php?confirmacion=1&descripcion=' . urlencode($descripcion) . '&fecha_salida=' . urlencode($fecha_salida) . '&cantidad_salida=' . urlencode($cantidad_salida) . '&id_producto=' . urlencode($id_producto) . '&motivo_salida=' . urlencode($motivo_salida) . '";
            } else {
                alert("Operación cancelada");
                window.location.href = "../paginas/home.php";
            }
          </script>';
} else {
    header("Location: procesar_salida.php?confirmacion=1&descripcion=" . urlencode($descripcion) . "&fecha_salida=" . urlencode($fecha_salida) . "&cantidad_salida=" . urlencode($cantidad_salida) . "&id_producto=" . urlencode($id_producto) . "&motivo_salida=" . urlencode($motivo_salida));
    exit;
}
?>



