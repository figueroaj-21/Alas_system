<?php
require "../php/conexion.php";

// Obtener los datos del producto desde $_GET
$fecha_entrada = $_GET['fecha_entrada'];
$cantidad_entrada = $_GET['cantidad_entrada'];
$costo_producto = $_GET['costo_producto'];
$id_producto = $_GET['id_producto'];
$motivo_entrada = $_GET['motivo_entrada'];

// Consulta de inserción con sentencia preparada
$sql_insert_entrada = "INSERT INTO tbl_entrada (fecha_entrada, cantidad_entrada, costo_producto, id_producto)
                       VALUES (?, ?, ?, ?)";

// Preparar la consulta de inserción
$stmt_insert = mysqli_prepare($conexion, $sql_insert_entrada);

// Vincular parámetros con los valores obtenidos de $_GET
mysqli_stmt_bind_param($stmt_insert, "ssss", $fecha_entrada, $cantidad_entrada, $costo_producto, $id_producto);

// Ejecutar la consulta de inserción
if (mysqli_stmt_execute($stmt_insert)) {
    // Consulta de actualización de existencia y costo del producto
    $sql_update_producto = "UPDATE tbl_productos 
                            SET existencia = existencia + ?, costo = ?
                            WHERE id_producto = ?";
    
    // Preparar la consulta de actualización
    $stmt_update_producto = mysqli_prepare($conexion, $sql_update_producto);
    mysqli_stmt_bind_param($stmt_update_producto, "dss", $cantidad_entrada, $costo_producto, $id_producto);
    mysqli_stmt_execute($stmt_update_producto);

    // Consulta para ajustar la existencia y evitar valores negativos
    $sql_ajustar_existencia = "UPDATE tbl_productos SET existencia = 0 WHERE existencia < 0";
    mysqli_query($conexion, $sql_ajustar_existencia);

    // Cerrar la sentencia preparada de la consulta de actualización
    mysqli_stmt_close($stmt_update_producto);
}

// Cerrar la sentencia preparada de la consulta de inserción y la conexión
mysqli_stmt_close($stmt_insert);
mysqli_close($conexion);

// Redireccionar a la página de inicio
header("Location: ../paginas/home.php");
exit;
?>
