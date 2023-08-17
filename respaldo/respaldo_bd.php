<?php require "../php/seguridad.php";  
  require "../php/conexion.php";
  $nombre_usuario = $_SESSION['nombre_usuario'];
  $apellido_usuario = $_SESSION['apellido_usuario'];
  $login_usuario = $_SESSION['login_usuario'];
  $nivel_usuario = $_SESSION['nivel_usuario'];
  
?>
<!doctype html>
<html lang="es">
<head>
  <title>Home</title>
  <link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Botones -->
    <script src="https://kit.fontawesome.com/068315295f.js" crossorigin="anonymous"></script>


    <!-- Enlace a Bootstrap web-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <style>
        /* Estilos personalizados */
        .center-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh; /* Asegura que el contenido esté centrado verticalmente en toda la ventana */
        }
    </style>

</head>
<body>

  <?php require "../html/nav2.html"; ?>

  <div class="center-container">
		<div class="col-md-6 container">
			<a href="./Backup.php" class="btn btn-primary mb-3 w-100">Respaldar la Base de Datos</a>
			<form action="./Restore.php" method="POST">
				<div class="mb-3">
					<label for="restorePoint" class="form-label">Selecciona un punto de restauración</label>
					<select name="restorePoint" id="restorePoint" class="form-select">
						<option value="" disabled selected>Selecciona un punto de restauración</option>
						<?php
						include_once './Connet.php';
						$ruta = BACKUP_PATH;
						if (is_dir($ruta)) {
							if ($aux = opendir($ruta)) {
								while (($archivo = readdir($aux)) !== false) {
									if ($archivo != "." && $archivo != "..") {
										$nombrearchivo = str_replace(".sql", "", $archivo);
										$nombrearchivo = str_replace("-", ":", $nombrearchivo);
										$ruta_completa = $ruta . $archivo;
										if (is_dir($ruta_completa)) {
										} else {
											echo '<option value="' . $ruta_completa . '">' . $nombrearchivo . '</option>';
										}
									}
								}
								closedir($aux);
							}
						} else {
							echo $ruta . " No es ruta válida";
						}
						?>
					</select>
				</div>
				<div><button type="submit" class="btn btn-success w-100">Restaurar</button></div>
			</form>
		</div>
	</div>

</body>
</html>