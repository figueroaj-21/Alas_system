<?php
require "../php/seguridad.php";
require "../php/conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];
    $password_actual = $_POST['password_actual'];
    $nuevo_password = $_POST['nuevo_password'];

    // Consulta para verificar la contraseña actual
    $sql_verificar = "SELECT clave_usuario FROM tbl_usuarios WHERE id_usuario = ?";
    
    $stmt_verificar = mysqli_prepare($conexion, $sql_verificar);

    if ($stmt_verificar) {
        mysqli_stmt_bind_param($stmt_verificar, "i", $id_usuario);
        mysqli_stmt_execute($stmt_verificar);
        mysqli_stmt_bind_result($stmt_verificar, $clave_usuario);
        mysqli_stmt_fetch($stmt_verificar);
        mysqli_stmt_close($stmt_verificar);

        if (password_verify($password_actual, $clave_usuario)) {
            // La contraseña actual es correcta, procedemos a actualizarla
            $nuevo_password_hash = password_hash($nuevo_password, PASSWORD_DEFAULT);
            $sql_actualizar = "UPDATE tbl_usuarios SET clave_usuario = ? WHERE id_usuario = ?";
        
            $stmt_actualizar = mysqli_prepare($conexion, $sql_actualizar);

            if ($stmt_actualizar) {
                mysqli_stmt_bind_param($stmt_actualizar, "si", $nuevo_password_hash, $id_usuario);
            
                if (mysqli_stmt_execute($stmt_actualizar)) {
                    // Contraseña actualizada exitosamente
                    echo '<script>
                            alert("Contraseña Actualizada exitosamente");
                            window.location = "../paginas/cambio_password.php";
                          </script>';
                } else {
                    echo "Error al actualizar la contraseña.";
                }

                mysqli_stmt_close($stmt_actualizar);
            } else {
                echo "Error al preparar la consulta de actualización: " . mysqli_error($conexion);
            }
        } else {
            echo "La contraseña actual es incorrecta.";
        }
    } else {
        echo "Error al preparar la consulta de verificación: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
} else {
    echo "Acceso no autorizado.";
}
?>
