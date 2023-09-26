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
$login_usuario = validarDatos($_POST["login_usuario"]);
$clave_usuario = validarDatos($_POST["clave_usuario"]);
$cedula_usuario = validarDatos($_POST["cedula_usuario"]);
$nombre_usuario = validarDatos($_POST["nombre_usuario"]);
$apellido_usuario = validarDatos($_POST["apellido_usuario"]);
$correo_usuario = validarDatos($_POST["correo_usuario"]);
$direccion_usuario = validarDatos($_POST["direccion_usuario"]);
$nivel_usuario = validarDatos($_POST["nivel_usuario"]);
$estado_usuario = validarDatos($_POST["estado_usuario"]);

// Verifica si el usuario ya existe
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM tbl_usuarios WHERE login_usuario = '$login_usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
  echo '
    <script>
      alert("Este nombre de usuario ya existe en la Base de Datos");
      window.location = "../paginas/consulta_usuarios.php";
    </script>';
  mysqli_close($conexion);
  exit();
}

// Verifica si el número de cédula ya está registrado
$verificar_cedula = mysqli_query($conexion, "SELECT * FROM tbl_usuarios WHERE cedula_usuario = '$cedula_usuario'");
if (mysqli_num_rows($verificar_cedula) > 0) {
  echo '
    <script>
      alert("Este número de cédula ya se encuentra registrado");
      window.location = "../paginas/consulta_usuarios.php";
    </script>';
  mysqli_close($conexion);
  exit();
}

// Encriptar la contraseña utilizando password_hash()
$hash_contrasena = password_hash($clave_usuario, PASSWORD_DEFAULT);

// Inserta los datos en la base de datos
$sql = "INSERT INTO tbl_usuarios (login_usuario, clave_usuario, cedula_usuario, nombre_usuario, apellido_usuario, correo_usuario, direccion_usuario, nivel_usuario, estado_usuario)
        VALUES ('$login_usuario', '$hash_contrasena', '$cedula_usuario', '$nombre_usuario', '$apellido_usuario', '$correo_usuario', '$direccion_usuario', '$nivel_usuario', '$estado_usuario')";

$resul = mysqli_query($conexion, $sql);

if ($resul) {
  echo '
    <script>
      alert("Usuario registrado exitosamente");
      window.location = "../paginas/consulta_usuarios.php";
    </script>';
  
  // Obtener la fecha actual
  $fecha = date("Y-m-d H:i:s");

    // Construir la consulta de inserción en tbl_auditoria
  $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$usuario', '$fecha', 'El usuario [$usuario] registró al usuario [$login_usuario]')";

  $auditoria = mysqli_query($conexion, $sql_aud);
  
  exit();
} else {
  echo '
    <script>
      alert("Error al registrar al usuario");
      window.location = "../paginas/registro_usuario.php";
    </script>';
  exit();
}

mysqli_close($conexion);
?>
