<?php
require "../php/conexion.php";

// Obtener los datos del producto desde $_GET
$fecha_salida = $_GET['fecha_salida'];
$cantidad_salida = $_GET['cantidad_salida'];
$id_producto = $_GET['id_producto'];
$motivo_salida = $_GET['motivo_salida'];

// Consulta de inserción con sentencia preparada
$sql_insert_salida = "INSERT INTO tbl_salida (fecha_salida, cantidad_salida, id_producto)
                     VALUES (?, ?, ?)";

// Preparar la consulta de inserción
$stmt_insert = mysqli_prepare($conexion, $sql_insert_salida);

// Vincular parámetros con los valores obtenidos de $_GET
mysqli_stmt_bind_param($stmt_insert, "sds", $fecha_salida, $cantidad_salida, $id_producto);

// Ejecutar la consulta de inserción
if (mysqli_stmt_execute($stmt_insert)) {
    // Consulta de actualización de existencia
    $sql_update_producto = "UPDATE tbl_productos 
                            SET existencia = existencia - ?
                            WHERE id_producto = ?";
    
    // Preparar la consulta de actualización
    $stmt_update_producto = mysqli_prepare($conexion, $sql_update_producto);
    mysqli_stmt_bind_param($stmt_update_producto, "ds", $cantidad_salida, $id_producto);
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

