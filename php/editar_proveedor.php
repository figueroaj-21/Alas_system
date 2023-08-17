<?php
require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_proveedor = $_POST['id_proveedor'];
    $rif_proveedor = $_POST['rif_proveedor'];
    $nombre_proveedor = $_POST['nombre_proveedor'];
    $numero_contacto = $_POST['numero_contacto'];
    $persona_contacto = $_POST['persona_contacto'];
    $correo_proveedor = $_POST['correo_proveedor'];

    // Actualizar los datos del Proveedor en la base de datos
    $sql = "UPDATE tbl_proveedores SET 
                rif_proveedor = '$rif_proveedor',
                nombre_proveedor = '$nombre_proveedor',
                numero_contacto = '$numero_contacto',
                persona_contacto = '$persona_contacto',
                correo_proveedor = '$correo_proveedor'
            WHERE id_proveedor = $id_proveedor";

    // Obtener la fecha actual
    $fecha = date("Y-m-d");

    // Construir la consulta de inserción en tbl_auditoria
    $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$usuario', '$fecha', 'El usuario [$usuario] actualizo el proveedor [$nombre_proveedor]')";

    $auditoria = mysqli_query($conexion, $sql_aud);

    if (mysqli_query($conexion, $sql)) {
        echo ' 
            <script>
                alert("Proveedor actualizado exitosamente");
                window.location = "../paginas/consulta_proveedores.php";
            </script>
        ';
        exit();
    } else {
        echo "Error al actualizar el proveedor: " . mysqli_error($conexion);
    }
}

// Cerrar la conexión
mysqli_close($conexion);
?>

