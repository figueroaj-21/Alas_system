<?php
	
	require "conexion.php";
  	session_start();


if (isset($_SESSION['id_usuario'])) {
    // Si la sesión existe y el usuario está registrado, se considera cierre de sesión

    // Obtener la fecha actual
    $fecha = date("Y-m-d");

    // Obtener el usuario de la sesión
    $login_usuario = $_SESSION['login_usuario'];

    // Construir la consulta de inserción para el cierre de sesión
    $sql_aud_cierre = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$login_usuario', '$fecha', 'El usuario [$login_usuario] cerró sesión')";
    $auditoria_cierre = $conexion->query($sql_aud_cierre);

    // Limpiar y destruir la sesión
    $_SESSION = array();
    session_destroy();

    header("location: ../index.html");
    exit();
}

mysqli_close($conexion);

?>