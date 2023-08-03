<?php
require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_producto = $_POST['id_producto'];
    $codigo = $_POST['codigo'];
    $descripcion = $_POST['descripcion'];
    $costo = $_POST['costo'];
    $existencia = $_POST['existencia'];
    $observaciones = $_POST['observaciones'];
    $id_clasificacion = $_POST['id_clasificacion'];
    $id_proveedor = $_POST['id_proveedor'];

    // Actualizar los datos del usuario en la base de datos
    $sql = "UPDATE tbl_productos SET 
                codigo = '$codigo',
                descripcion = '$descripcion',
                costo = '$costo',
                existencia = $existencia,
                observaciones = '$observaciones',
                id_clasificacion = '$id_clasificacion',
                id_proveedor = $id_proveedor
            WHERE id_producto = $id_producto";

    if (mysqli_query($conexion, $sql)) {
        echo ' 
            <script>
                alert("Producto actualizado exitosamente");
                window.location = "../paginas/home.php";
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

