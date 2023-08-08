<?php
require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["id_producto"]) && is_numeric($_GET["id_producto"])) {
    $id_producto = $_GET["id_producto"];

    // Consulta para obtener el estado actual y la descripción del producto
    $sql_estado_descripcion = "SELECT estado_producto, descripcion FROM tbl_productos WHERE id_producto = ?";
    
    $stmt_estado_descripcion = mysqli_prepare($conexion, $sql_estado_descripcion);
    mysqli_stmt_bind_param($stmt_estado_descripcion, "i", $id_producto);
    mysqli_stmt_execute($stmt_estado_descripcion);
    mysqli_stmt_bind_result($stmt_estado_descripcion, $estado_producto, $descripcion);
    mysqli_stmt_fetch($stmt_estado_descripcion);
    mysqli_stmt_close($stmt_estado_descripcion);

    if ($estado_producto !== null) {
        // Cambiar el estado del producto entre habilitado e inhabilitado
        $nuevo_estado = ($estado_producto == 1) ? 0 : 1;

        // Consulta para actualizar el estado del producto en la base de datos
        $sql_actualizar = "UPDATE tbl_productos SET estado_producto = ? WHERE id_producto = ?";
        
        $stmt_actualizar = mysqli_prepare($conexion, $sql_actualizar);
        mysqli_stmt_bind_param($stmt_actualizar, "ii", $nuevo_estado, $id_producto);

        // Obtener la fecha actual
        $fecha = date("Y-m-d");

        // Ejecutar la consulta de actualización
        if (mysqli_stmt_execute($stmt_actualizar)) {
            // Construir la consulta de inserción en tbl_auditoria
            $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES (?, ?, ?)";
            $stmt_aud = mysqli_prepare($conexion, $sql_aud);
            $accion = "El usuario [$usuario] " . ($nuevo_estado == 1 ? "habilitó" : "inhabilitó") . " el producto [$descripcion]";
            mysqli_stmt_bind_param($stmt_aud, "sss", $usuario, $fecha, $accion);

            if (mysqli_stmt_execute($stmt_aud)) {
                // Si la consulta fue exitosa, devuelve una respuesta JSON con éxito y el nuevo estado del producto
                echo json_encode(["success" => true, "estado_producto" => $nuevo_estado]);
            } else {
                // Si la consulta falló, devuelve una respuesta JSON con error
                echo json_encode(["success" => false]);
            }

            // Cerrar la sentencia preparada de la consulta de inserción en tbl_auditoria
            mysqli_stmt_close($stmt_aud);
        } else {
            // Si la consulta de actualización falló, devuelve una respuesta JSON con error
            echo json_encode(["success" => false]);
        }

        // Cerrar la sentencia preparada de la consulta de actualización en tbl_productos
        mysqli_stmt_close($stmt_actualizar);
    } else {
        // El producto no se encontró en la base de datos o no tiene un estado válido
        echo json_encode(["success" => false]);
    }
} else {
    // Si no se proporcionó un ID de producto válido, devuelve una respuesta JSON con error
    echo json_encode(["success" => false]);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>