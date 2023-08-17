<?php
require "../php/seguridad.php";
include './Connet.php';

$day = date("d");
$month = date("m");
$year = date("Y");
$hora = date("H-i-s");
$fecha = $day . '_' . $month . '_' . $year;
$DataBASE = $fecha . "_(" . $hora . "_hrs).sql";
$tables = array();
$result = SGBD::sql('SHOW TABLES');
$error = 0;

if ($result) {
    while ($row = mysqli_fetch_row($result)) {
       $tables[] = $row[0];
    }
    $sql = 'SET FOREIGN_KEY_CHECKS=0;' . "\n\n";
    $sql .= 'CREATE DATABASE IF NOT EXISTS ' . BD . ";\n\n";
    $sql .= 'USE ' . BD . ";\n\n";

    foreach ($tables as $table) {
        $result = SGBD::sql('SELECT * FROM ' . $table);

        if ($result) {
            $numFields = mysqli_num_fields($result);
            $sql .= 'DROP TABLE IF EXISTS ' . $table . ';';
            $row2 = mysqli_fetch_row(SGBD::sql('SHOW CREATE TABLE ' . $table));
            $sql .= "\n\n" . $row2[1] . ";\n\n";

            while ($row = mysqli_fetch_row($result)) {
                $sql .= 'INSERT INTO ' . $table . ' VALUES(';

                for ($j = 0; $j < $numFields; $j++) {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n", "\\n", $row[$j]);

                    if (isset($row[$j])) {
                        $sql .= '"' . $row[$j] . '"';
                    } else {
                        $sql .= '""';
                    }

                    if ($j < ($numFields - 1)) {
                        $sql .= ',';
                    }
                }
                $sql .= ");\n";
            }
            $sql .= "\n\n\n";
        } else {
            $error = 1;
        }
    }

    if ($error == 1) {
        echo 'Ocurrió un error inesperado al crear la copia de seguridad';
    } else {
        chmod(BACKUP_PATH, 0777);
        $sql .= 'SET FOREIGN_KEY_CHECKS=1;';
        $handle = fopen(BACKUP_PATH . $DataBASE, 'w+');

        if (fwrite($handle, $sql)) {
            fclose($handle);
            echo ' 
                <script>
                alert("Respaldo Realizado Con Éxito");
                window.location = "../paginas/home.php";
                </script>';
            
            // Auditoría
            if (isset($_SESSION['login_usuario'])) {
                $usuario = $_SESSION['login_usuario'];

                require "../php/conexion.php"; // Agregar esta línea

                // Obtener la fecha actual
                $fecha_auditoria = date("Y-m-d");

                // Construir la consulta de inserción en tbl_auditoria
                $accion_aud = "El usuario [$usuario] realizó un respaldo de la base de datos";
                $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES (?, ?, ?)";
                $stmt_aud = mysqli_prepare($conexion, $sql_aud);

                if ($stmt_aud) {
                    mysqli_stmt_bind_param($stmt_aud, "sss", $usuario, $fecha_auditoria, $accion_aud);

                    if (mysqli_stmt_execute($stmt_aud)) {
                        // Auditoría registrada exitosamente
                        echo '<script>
                                console.log("Auditoría registrada exitosamente");
                              </script>';
                    } else {
                        echo "Error al registrar la auditoría.";
                    }

                    mysqli_stmt_close($stmt_aud);
                } else {
                    echo "Error al preparar la consulta de auditoría: " . mysqli_error($conexion);
                }

                mysqli_close($conexion);
            }
        } else {
            echo 'Ocurrió un error inesperado al crear la copia de seguridad';
        }
    }
} else {
    echo 'Ocurrió un error inesperado';
}

mysqli_free_result($result);
?>