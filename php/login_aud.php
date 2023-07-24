<?php
require "conexion.php";
session_start();

if ($_POST) {
    $login_usuario = $_POST['login_usuario'];
    $password = $_POST['clave_usuario'];

    echo $login_usuario;

    $sql = "SELECT id_usuario, login_usuario, clave_usuario, nombre_usuario, apellido_usuario FROM tbl_usuarios WHERE login_usuario='$login_usuario'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $password_db = $row['clave_usuario'];

        if ($password_db == $password) {
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['login_usuario'] = $row['login_usuario'];
            $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
            $_SESSION['apellido_usuario'] = $row['apellido_usuario'];

            // Obtener la fecha actual
            $fecha = date("Y-m-d H:i:s");

            // Construir la consulta de inserción
            $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('".$row['login_usuario']."', '$fecha', 'El usuario [$login_usuario] inició sesión como usuario')";

            $auditoria = $conexion->query($sql_aud);

            header("location: ../paginas/home.php");
            exit();
        } else {
            echo '<script>alert("Contraseña errada");</script>';
        }
    } else {
        echo '<script>alert("No existe el usuario");</script>';
    }

    echo '<script>window.location = "../index.html";</script>';
}

mysqli_close($conexion);
?>
