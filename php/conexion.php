<?php
  $conexion = mysqli_connect("localhost", "root", "", "bd_alas")
   or die("Error en conexion al gestor de bases de datos: " . mysqli_error($conexion));
?>