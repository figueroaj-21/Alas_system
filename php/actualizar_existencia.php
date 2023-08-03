<?php
// Establecer la conexión a la base de datos
require_once "conexion.php"; // Asegúrate de tener el archivo de conexión

// Función para actualizar la existencia en la tabla "productos" a partir de las "entradas" y "salidas"
function actualizarExistencia()
{
    global $conexion;

    // Actualizar existencia a partir de las "entradas"
    $sql_entradas = "UPDATE productos p
                    INNER JOIN (
                        SELECT id_producto, SUM(cantidad) AS total_entradas
                        FROM entradas
                        GROUP BY id_producto
                    ) e ON p.id_producto = e.id_producto
                    SET p.existencia = p.existencia + e.total_entradas";
    mysqli_query($conexion, $sql_entradas);

    // Actualizar existencia a partir de las "salidas"
    $sql_salidas = "UPDATE productos p
                    INNER JOIN (
                        SELECT id_producto, SUM(cantidad) AS total_salidas
                        FROM salidas
                        GROUP BY id_producto
                    ) s ON p.id_producto = s.id_producto
                    SET p.existencia = p.existencia - s.total_salidas";
    mysqli_query($conexion, $sql_salidas);
}

// Llamar a la función para realizar las actualizaciones
actualizarExistencia();

// Cerrar la conexión
mysqli_close($conexion);
?>
