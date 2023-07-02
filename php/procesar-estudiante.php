<?php
  //Establece la conexion a la base de datos
  require "conexion.php";
  //Asigna a las variables los datos traidos del formulario
  $cedula = $_POST["cedula"];
  $nombres = $_POST["nombres"];
  $apellidos = $_POST["apellidos"];
  $tel_movil = $_POST["tel-movil"];
  $email = $_POST["email"];

  $verificar_cedula = mysqli_query($conexion, "SELECT * FROM tbl_estudiante WHERE cedula_estudiante = '$cedula'");

  $sql = "INSERT INTO tbl_estudiante (cedula_estudiante, nombre_estudiante,
  apellido_estudiante, telefono_movil_estudiante, email_estudiante)
  VALUES ('$cedula', '$nombres', '$apellidos', '$tel_movil', '$email')";

  if(mysqli_num_rows($verificar_cedula) > 0){
    echo'
      <script>
        alert("Este número de cédula ya se encuentra registrado");
      </script>
    ';
    echo'
      <script>
        window.location = "../paginas/registro-estudiante.php";
      </script>
      exit();
    ';
  }

  $resul = mysqli_query($conexion, $sql);

  if($resul){
    echo'
      <script>
        alert("Estudiante registado exitosamente");
      </script>
    ';
    echo'
      <script>
        window.location = "../paginas/registro-estudiante.php";
      </script>
      exit();
    ';
  }else{
    echo'
      <script>
        alert("Error al registrar al estudiante");
      </script>
    ';  
    echo'
      <script>
        window.location = "../paginas/registro-estudiante.php";
      </script>
      exit();
    ';
}  
  mysqli_close($conexion);
?>