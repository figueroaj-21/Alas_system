<?php
// Establece la conexión a la base de datos
require "conexion.php";

// Función para validar y sanear los datos ingresados por el usuario
function validarDatos($dato)
{
  $dato = trim($dato);
  $dato = stripslashes($dato);
  $dato = htmlspecialchars($dato);
  return $dato;
}

// Asigna a las variables los datos traídos del formulario (validados y saneados)
$usuario = validarDatos($_POST["usuario"]);
$clave_usuario = validarDatos($_POST["clave_usuario"]);
$cedula_usuario = validarDatos($_POST["cedula_usuario"]);
$nombre_usuario = validarDatos($_POST["nombre_usuario"]);
$apellido_usuario = validarDatos($_POST["apellido_usuario"]);
$correo_usuario = validarDatos($_POST["correo_usuario"]);
$direccion_usuario = validarDatos($_POST["direccion_usuario"]);

// Verifica si el usuario ya está registrado
$verificar_cedula = mysqli_query($conexion, "SELECT * FROM tbl_usuarios WHERE cedula_usuario = '$cedula_usuario'");
if (mysqli_num_rows($verificar_cedula) > 0) {
  echo '
    <script>
      alert("Este usuario ya se encuentra registrado");
      window.location = "../paginas/consulta_usuarios.php";
    </script>
    exit();
  ';
  mysqli_close($conexion);
}

// Encripta la contraseña
//$hashed_password = password_hash($clave_usuario, PASSWORD_DEFAULT);

// Inserta los datos en la base de datos
$sql = "INSERT INTO tbl_usuarios (usuario, clave_usuario, cedula_usuario, nombre_usuario, apellido_usuario, correo_usuario, direccion_usuario)
        VALUES ('$usuario', '$clave_usuario', '$cedula_usuario', '$nombre_usuario', '$apellido_usuario', '$correo_usuario', '$direccion_usuario')";

$resul = mysqli_query($conexion, $sql);

if ($resul) {
  echo '
    <script>
      alert("Usuario registrado exitosamente");
      window.location = "../paginas/consulta_usuarios.php";
    </script>
    exit();
  ';
} else {
  echo '
    <script>
      alert("Error al registrar al usuario");
      window.location = "../paginas/registro_usuario.php";
    </script>
    exit();
  ';
}

mysqli_close($conexion);
?>

