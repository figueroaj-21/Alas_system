<?php
require "../php/seguridad.php";
require "../php/conexion.php";
$nombre_usuario = $_SESSION['nombre_usuario'];
$apellido_usuario = $_SESSION['apellido_usuario'];
$login_usuario = $_SESSION['login_usuario'];
$nivel_usuario = $_SESSION['nivel_usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Respaldar Base de Datos</title>
	<link rel="shortcut icon" type="image/x-icon" href="../img/logoalas.ico" />
	<!-- Enlaces a Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<style>
		div.container {
			height: 100vh;
			display: flex;
			justify-content: center;
			margin-top: 150px;
		}
	</style>
</head>
<body>

	<?php require "../html/nav2.html"; ?>

	<div class="container">
		<div class="col-md-6">
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
				<button type="submit" class="btn btn-success w-100">Restaurar</button>
			</form>
		</div>
	</div>

	<!-- Scripts de Bootstrap -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>

