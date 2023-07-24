<?php
// Establece la conexión a la base de datos
require "conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

// Función para validar y sanear los datos ingresados por el usuario
function validarDatos($dato)
{
  $dato = trim($dato);
  $dato = stripslashes($dato);
  $dato = htmlspecialchars($dato);
  return $dato;
}

// Asigna a las variables los datos traídos del formulario (validados y saneados)
$rif_proveedor = validarDatos($_POST["rif_proveedor"]);
$nombre_proveedor = validarDatos($_POST["nombre_proveedor"]);
$persona_contacto = validarDatos($_POST["persona_contacto"]);
$numero_contacto = validarDatos($_POST["numero_contacto"]);
$correo_proveedor = validarDatos($_POST["correo_proveedor"]);

// Verifica si el proveedor ya está registrado
$sql = "SELECT * FROM tbl_proveedores WHERE rif_proveedor = ?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "s", $rif_proveedor);
mysqli_stmt_execute($stmt);
$resultado = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($resultado) > 0) {
  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
  echo '
    <script>
      alert("Este Proveedor ya se encuentra registrado");
      window.location = "../paginas/consulta_proveedores.php";
    </script>';
  exit();
}

// Inserta los datos en la base de datos
$sql = "INSERT INTO tbl_proveedores (rif_proveedor, nombre_proveedor, persona_contacto, numero_contacto, correo_proveedor)
        VALUES (?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $rif_proveedor, $nombre_proveedor, $persona_contacto, $numero_contacto, $correo_proveedor);
$resul = mysqli_stmt_execute($stmt);

if ($resul) {
  mysqli_stmt_close($stmt);

  // Obtener la fecha actual
  $fecha = date("Y-m-d H:i:s");

  // Construir la consulta de inserción en tbl_auditoria
  $accion_aud = "El usuario [$usuario] registró al Proveedor [$nombre_proveedor]";
  $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES (?, ?, ?)";
  $stmt_aud = mysqli_prepare($conexion, $sql_aud);
  mysqli_stmt_bind_param($stmt_aud, "sss", $usuario, $fecha, $accion_aud);
  mysqli_stmt_execute($stmt_aud);
  mysqli_stmt_close($stmt_aud);

  mysqli_close($conexion);

  echo '
    <script>
      alert("Proveedor registrado exitosamente");
      window.location = "../paginas/consulta_proveedores.php";
    </script>';
  exit();

} else {
  mysqli_stmt_close($stmt);
  mysqli_close($conexion);
  echo '
    <script>
      alert("Error al registrar el Proveedor");
      window.location = "../paginas/consulta_proveedores.php";
    </script>';
  exit();
}
?>

