<?php
  require "conexion.php";
  session_start();

  if($_POST){
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT id_usuario, usuario, clave_usuario, nombre_usuario, apellido_usuario FROM  tbl_usuarios WHERE usuario='$usuario'";

    $resultado = $conexion->query($sql);

    $num = $resultado->num_rows;

    if($num>0){

      $row = $resultado->fetch_assoc();
      $password_db = $row['clave_usuario'];
      $pass_c = sha1($password);

      if($password_db == $password){
        $_SESSION['id_usuario'] = $row['id_usuario'];
        $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
        $_SESSION['apellido_usuario'] = $row['apellido_usuario'];

        header("location: ../paginas/home.php");

      }else{

        echo'
          <script>
            alert("Contraseña errada");
          </script>
        ';  

        echo'
          <script>
            window.location = "../index.html";
          </script>
          exit();
        ';
      }

    }else{

      echo'
        <script>
          alert("No existe el usuario");
        </script>
      ';  

      echo'
        <script>
          window.location = "../index.html";
        </script>
        exit();
      ';
    }
  }
  mysqli_close($conexion);
  /*<?php echo $_SERVER['PHP_SELF'];?>*/
  ?>
