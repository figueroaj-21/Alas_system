<?php
require "../php/seguridad.php";
require "../php/conexion.php";

// Incluir la librería FPDF
require "../fpdf/fpdf.php";

// Obtener los datos del usuario desde $_SESSION
$nombre_usuario = $_SESSION['nombre_usuario'];
$apellido_usuario = $_SESSION['apellido_usuario'];

// Consulta para obtener los datos de los productos
$sql_facturas = "SELECT id_auditoria, usuario_aud, tiemporegistro_aud, accion_aud FROM tbl_auditoria ORDER BY id_auditoria DESC";

// Ejecutar la consulta y obtener los resultados
$resultado = mysqli_query($conexion, $sql_facturas) or die("Error al consultar productos: " . mysqli_error($conexion));

// Crear un nuevo PDF con conjunto de caracteres ISO-8859-1
$pdf = new FPDF('L', 'mm', 'A4');
$pdf->AddPage();

// Ruta de la imagen que deseas agregar al PDF
$imagen = '../img/logoalas.png'; 

// Coordenadas donde deseas ubicar la imagen en el PDF
$posX = 4;
$posY = -4;

// Ancho y alto de la imagen en el PDF
$ancho = 40;
$alto = 40;

// Agregar la imagen al PDF
$pdf->Image($imagen, $posX, $posY, $ancho, $alto);

// Agregar el encabezado del PDF con caracteres ISO-8859-1
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Reporte de Bitácora del Sistema'), 0, 1, 'C');
$pdf->Ln(10);

// Agregar los datos de los productos en una tabla
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(20, 10, 'ID', 1);
$pdf->Cell(40, 10, 'Usuario', 1);
$pdf->Cell(60, 10, 'Fecha del Registro', 1);
$pdf->MultiCell(140, 10, 'Acción', 1); // Ajustar ancho para el contenido con salto de línea
$pdf->Ln();

// Recorrer los resultados y agregar los datos a la tabla con caracteres ISO-8859-1
while ($row_factura = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    $pdf->Cell(20, 10, $row_factura['id_auditoria'], 1);
    $pdf->Cell(40, 10, utf8_decode($row_factura['usuario_aud']), 1); // Convertir a ISO-8859-1
    $pdf->Cell(60, 10, utf8_decode($row_factura['tiemporegistro_aud']), 1); // Convertir a ISO-8859-1
    $pdf->MultiCell(140, 10, utf8_decode($row_factura['accion_aud']), 1); // Convertir a ISO-8859-1 con salto de línea
}

// Salida del PDF
$pdf->Output();

// Cierra la conexión
mysqli_close($conexion);
?>

