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
$clasificacion = validarDatos($_POST["clasificacion"]);
// Verifica si el usuario ya está registrado
$verificar_clasificacion = mysqli_query($conexion, "SELECT * FROM tbl_clasificacion WHERE clasificacion = '$clasificacion'");
if (mysqli_num_rows($verificar_clasificacion) > 0) {
  echo '
    <script>
      alert("Esta Clasificación ya se encuentra registrada");
      window.location = "../paginas/consulta_clasificacion.php";
    </script>
    exit();
  ';
  mysqli_close($conexion);
}


// Inserta los datos en la base de datos
$sql = "INSERT INTO tbl_clasificacion (clasificacion)
        VALUES ('$clasificacion')";

$resul = mysqli_query($conexion, $sql);

if ($resul) {
  echo '
    <script>
      alert("Clasificación registrada exitosamente");
      window.location = "../paginas/consulta_clasificacion.php";
    </script>
    exit();
  ';

   // Obtener la fecha actual
  $fecha = date("Y-m-d H:i:s");

    // Construir la consulta de inserción en tbl_auditoria
  $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$usuario', '$fecha', 'El usuario [$usuario] registró la clasificacion [$clasificacion]')";

  $auditoria = mysqli_query($conexion, $sql_aud);
  
  exit();

} else {
  echo '
    <script>
      alert("Error al registrar Clasificación");
      window.location = "../paginas/consulta_clasificacion.php";
    </script>
    exit();
  ';
}

mysqli_close($conexion);
?>

