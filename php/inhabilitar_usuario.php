<?php
require "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["id_usuario"]) && is_numeric($_GET["id_usuario"])) {
    $id_usuario = $_GET["id_usuario"];

    // Consulta para obtener el estado actual del producto
    $sql_estado = "SELECT estado_usuario FROM tbl_usuarios WHERE id_usuario = $id_usuario";

    $resultado_estado = mysqli_query($conexion, $sql_estado);

    if ($resultado_estado && mysqli_num_rows($resultado_estado) > 0) {
        $row = mysqli_fetch_assoc($resultado_estado);
        $estado_usuario = $row['estado_usuario'];

        // Cambiar el estado del producto entre habilitado e inhabilitado
        $nuevo_estado = ($estado_usuario == 1) ? 0 : 1;

        // Consulta para actualizar el estado del producto en la base de datos
        $sql_actualizar = "UPDATE tbl_usuarios SET estado_usuario = $nuevo_estado WHERE id_usuario = $id_usuario";

        if (mysqli_query($conexion, $sql_actualizar)) {
            // Si la consulta fue exitosa, devuelve una respuesta JSON con éxito y el nuevo estado del producto
            echo json_encode(["success" => true, "estado_usuario" => $nuevo_estado]);
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
