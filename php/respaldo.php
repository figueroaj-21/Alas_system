<?php
// Verifica si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  // Establece la conexión a la base de datos
  $db_host = "localhost";
  $db_user = "root";
  $db_pass = "";
  $db_name = "bd_alas";


  require "conexion.php"; // Asegúrate de tener el archivo de conexión con la base de datos

  // Obtiene el nombre del archivo ingresado por el usuario
  $nombre_archivo = $_POST["nombre_archivo"];

  // Genera el nombre completo del archivo con la extensión .sql
  $archivo_sql = $nombre_archivo . ".sql";

  // Comando para realizar el respaldo de la base de datos (puedes ajustarlo según tu gestor de base de datos)
  $comando_respaldo = "C:/xampp/mysql/bin/mysqldump --h$db_host -u$db_user -p$db_pass --opt $db_name> " . $archivo_sql;
    
  // Ejecuta el comando para crear el archivo de respaldo
  exec($comando_respaldo);

  // Verifica si se creó correctamente el archivo de respaldo
  if (file_exists($archivo_sql)) {
    // Descarga el archivo
    header("Content-Type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . $archivo_sql);
    readfile($archivo_sql);
    

    // Elimina el archivo temporal de respaldo
    unlink($archivo_sql);
  } else {
    echo "Error al crear el archivo de respaldo.";
  }
}
?>
