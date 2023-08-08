<?php 
// Establece la conexión a la base de datos
require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];
$id_usuario = $_SESSION['id_usuario'];


// Función para validar y sanear los datos ingresados por el usuario
function validarDatos($dato)
{
  $dato = trim($dato);
  $dato = stripslashes($dato);
  $dato = htmlspecialchars($dato);
  return $dato;
}

// Obtiene el valor seleccionado en el elemento select
    $codigo = validarDatos($_POST["codigo"]);
    $id_clasificacion = validarDatos($_POST["id_clasificacion"]);
    $descripcion = validarDatos($_POST["descripcion"]);
    $costo = validarDatos($_POST["costo"]);
    $existencia = validarDatos($_POST["existencia"]);
    $stock_minimo = validarDatos($_POST["stock_minimo"]);
    $id_proveedor = validarDatos($_POST["id_proveedor"]);
    $observaciones = validarDatos($_POST["observaciones"]);
    $estado_producto = validarDatos($_POST["estado_producto"]);

// Verifica si el producto ya está registrado
$verificar_producto = mysqli_query($conexion, "SELECT * FROM tbl_productos WHERE codigo = '$codigo'");
if (mysqli_num_rows($verificar_producto) > 0) {
  echo '
    <script>
      alert("Este producto ya se encuentra registrado");
      window.location = "../paginas/home.php";
    </script>';
  mysqli_close($conexion);
  exit();
}

// Realiza la inserción en la base de datos (sustituye 'nombre_tabla' por el nombre de tu tabla)
    $sql_insert = "INSERT INTO tbl_productos (codigo, descripcion, costo, existencia, stock_minimo, observaciones, id_clasificacion, id_proveedor, id_usuario, estado_producto) VALUES ('$codigo', '$descripcion', '$costo', '$existencia', '$stock_minimo', '$observaciones', '$id_clasificacion', '$id_proveedor', '$id_usuario', '$estado_producto')";
    $result_insert = mysqli_query($conexion, $sql_insert);

if ($sql_insert) {
  echo '
    <script>
      alert("Producto registrado exitosamente");
      window.location = "../paginas/home.php";
    </script>';
  
  // Obtener la fecha actual
  $fecha = date("Y-m-d H:i:s");

    // Construir la consulta de inserción en tbl_auditoria
  $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$usuario', '$fecha', 'El usuario [$usuario] registró el producto [$descripcion]')";

  $auditoria = mysqli_query($conexion, $sql_aud);
  
  exit();
} else {
  echo '
    <script>
      alert("Error al registrar el producto");
      window.location = "../paginas/home.php";
    </script>';
  exit();
}

mysqli_close($conexion);
?>
