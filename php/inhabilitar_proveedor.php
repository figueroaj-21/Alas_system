<?php require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_GET["id_proveedor"]) && is_numeric($_GET["id_proveedor"])) {
    $id_proveedor = $_GET["id_proveedor"];

    // Consulta para obtener el estado actual del proveedor
    $sql_estado = "SELECT estado_proveedor, nombre_proveedor FROM tbl_proveedores WHERE id_proveedor = ?";
    
    $stmt_estado = mysqli_prepare($conexion, $sql_estado);
    mysqli_stmt_bind_param($stmt_estado, "i", $id_proveedor);
    mysqli_stmt_execute($stmt_estado);
    mysqli_stmt_bind_result($stmt_estado, $estado_proveedor, $nombre_proveedor);
    mysqli_stmt_fetch($stmt_estado);
    mysqli_stmt_close($stmt_estado);

    if ($estado_proveedor !== null) {
        // Cambiar el estado del proveedor entre habilitado e inhabilitado
        $nuevo_estado = ($estado_proveedor == 1) ? 0 : 1;

        // Consulta para actualizar el estado del proveedor en la base de datos
        $sql_actualizar = "UPDATE tbl_proveedores SET estado_proveedor = ? WHERE id_proveedor = ?";
        
        $stmt_actualizar = mysqli_prepare($conexion, $sql_actualizar);
        mysqli_stmt_bind_param($stmt_actualizar, "ii", $nuevo_estado, $id_proveedor);

        // Ejecutar la consulta de actualización
        if (mysqli_stmt_execute($stmt_actualizar)) {
            // Obtener la fecha actual
            $fecha = date("Y-m-d");

            // Construir la consulta de inserción en tbl_auditoria
            $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES (?, ?, ?)";
            $stmt_aud = mysqli_prepare($conexion, $sql_aud);
            $accion = "El usuario [$usuario] " . ($nuevo_estado == 1 ? "habilitó" : "inhabilitó") . " el proveedor [$nombre_proveedor]";
            mysqli_stmt_bind_param($stmt_aud, "sss", $usuario, $fecha, $accion);

            if (mysqli_stmt_execute($stmt_aud)) {
                // Si la consulta fue exitosa, devuelve una respuesta JSON con éxito y el nuevo estado del proveedor
                echo json_encode(["success" => true, "estado_proveedor" => $nuevo_estado]);
            } else {
                // Si la consulta de auditoría falló, devuelve una respuesta JSON con error
                echo json_encode(["success" => false]);
            }

            // Cerrar la sentencia preparada de la consulta de inserción en tbl_auditoria
            mysqli_stmt_close($stmt_aud);
        } else {
            // Si la consulta de actualización falló, devuelve una respuesta JSON con error
            echo json_encode(["success" => false]);
        }

        // Cerrar la sentencia preparada de la consulta de actualización en tbl_proveedores
        mysqli_stmt_close($stmt_actualizar);
    } else {
        // El proveedor no se encontró en la base de datos o no tiene un estado válido
        echo json_encode(["success" => false]);
    }
} else {
    // Si no se proporcionó un ID de proveedor válido, devuelve una respuesta JSON con error
    echo json_encode(["success" => false]);
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);

?>