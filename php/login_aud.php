<?php

require "conexion.php";
session_start();

if ($_POST) {
    $login_usuario = $_POST['login_usuario'];
    $password = $_POST['clave_usuario'];

    $sql = "SELECT id_usuario, login_usuario, clave_usuario, nombre_usuario, apellido_usuario FROM tbl_usuarios WHERE login_usuario=?";
    
    // Preparar la consulta
    $stmt = mysqli_prepare($conexion, $sql);
    mysqli_stmt_bind_param($stmt, "s", $login_usuario);
    mysqli_stmt_execute($stmt);

    // Obtener el resultado de la consulta
    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado->num_rows > 0) {
        $row = $resultado->fetch_assoc();
        $password_db = $row['clave_usuario'];

        // Verificar la contraseña utilizando password_verify()
        if (password_verify($password, $password_db)) {
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['login_usuario'] = $row['login_usuario'];
            $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
            $_SESSION['apellido_usuario'] = $row['apellido_usuario'];

            // Obtener la fecha actual
            $fecha = date("Y-m-d");

            // Construir la consulta de inserción
            $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES (?, ?, ?)";
            $stmt_auditoria = mysqli_prepare($conexion, $sql_aud);
            $accion = "El usuario [$login_usuario] inició sesión como usuario";
            mysqli_stmt_bind_param($stmt_auditoria, "sss", $login_usuario, $fecha, $accion);
            mysqli_stmt_execute($stmt_auditoria);
            mysqli_stmt_close($stmt_auditoria);

            mysqli_stmt_close($stmt);
            mysqli_close($conexion);

            header("location: ../paginas/home.php");
            exit();
        } else {
            echo '<script>alert("Contraseña errada");</script>';
        }
    } else {
        echo '<script>alert("No existe el usuario");</script>';
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conexion);

    echo '<script>window.location = "../index.html";</script>';
}

?>