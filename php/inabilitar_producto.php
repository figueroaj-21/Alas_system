<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["id_producto"]) && is_numeric($_GET["id_producto"])) {
    $id_producto = $_GET["id_producto"];

    // Consulta para obtener el estado actual del producto
    $sql_estado = "SELECT estado FROM tbl_productos WHERE id_producto = $id_producto";

    $resultado_estado = mysqli_query($conexion, $sql_estado);

    if ($resultado_estado && mysqli_num_rows($resultado_estado) > 0) {
        $row = mysqli_fetch_assoc($resultado_estado);
        $estado_producto = $row['estado'];

        // Cambiar el estado del producto entre habilitado e inhabilitado
        $nuevo_estado = ($estado_producto == 1) ? 0 : 1;

        // Consulta para actualizar el estado del producto en la base de datos
        $sql_actualizar = "UPDATE tbl_productos SET estado = $nuevo_estado WHERE id_producto = $id_producto";

        if (mysqli_query($conexion, $sql_actualizar)) {
            // Si la consulta fue exitosa, devuelve una respuesta JSON con éxito y el nuevo estado del producto
            echo json_encode(["success" => true, "estado" => $nuevo_estado]);
        } else {
            // Si la consulta falló, devuelve una respuesta JSON con error
            echo json_encode(["success" => false]);
        }
    } else {
        // El producto no se encontró en la base de datos o no tiene un estado válido
        echo json_encode(["success" => false]);
    }
} else {
    // Si no se proporcionó un ID de producto válido, devuelve una respuesta JSON con error
    echo json_encode(["success" => false]);
}
