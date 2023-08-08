<?php
require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_usuario = $_POST['id_usuario'];
    $login_usuario = $_POST['login_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $apellido_usuario = $_POST['apellido_usuario'];
    $correo_usuario = $_POST['correo_usuario'];
    $direccion_usuario = $_POST['direccion_usuario'];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE tbl_usuarios SET 
                login_usuario = '$login_usuario',
                nombre_usuario = '$nombre_usuario',
                apellido_usuario = '$apellido_usuario',
                correo_usuario = '$correo_usuario',
                direccion_usuario = '$direccion_usuario'
            WHERE id_usuario = $id_usuario";

    // Obtener la fecha actual
    $fecha = date("Y-m-d");

    // Construir la consulta de inserción en tbl_auditoria
    $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$usuario', '$fecha', 'El usuario [$usuario] actualizo al usuario [$login_usuario]')";

    $auditoria = mysqli_query($conexion, $sql_aud);

    if (mysqli_query($conexion, $sql)) {
        echo ' 
            <script>
                alert("Usuario actualizado exitosamente");
                window.location = "../paginas/consulta_usuarios.php";
            </script>
        ';
        exit();
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>

