<?php ini_set('display_errors', 1);
error_reporting(E_ALL);

require "./seguridad.php"; 
// Establece la conexión a la base de datos
require "conexion.php";

$activo = $_SESSION['login_usuario'];
$nombre_usuario = $_SESSION['nombre_usuario'];

echo 'fgfgf ' . $nombre_usuario;


?>