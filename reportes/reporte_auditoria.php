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

$fecha = date("Y-m-d");

// Crear un nuevo PDF
$pdf = new FPDF('L', 'mm', 'A4'); 
$pdf->AddPage('L');

// Ruta de la imagen que deseas agregar al PDF
$imagen = '../img/logoalas.png'; 

// Coordenadas donde deseas ubicar la imagen en el PDF
$posX = 260;
$posY = -4;

// Ancho y alto de la imagen en el PDF
$ancho = 40;
$alto = 40;



// Agregar el encabezado del PDF
$pdf->SetFillColor(253, 135, 39);
$pdf->Rect(0, 0, 300, 30, 'F');
$pdf->SetY(12); 
$pdf->SetFont('Arial', 'B', 30);
$pdf->SetTextColor(255, 255, 255);
$pdf->Write(5, utf8_decode('Reporte de Bitácora del Sistema al ' . $fecha));
$pdf->Ln(25);

// Agregar la imagen al PDF
$pdf->Image($imagen, $posX, $posY, $ancho, $alto);

// Agregar los datos de los productos en una tabla
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(79, 78, 77);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(20, 10, 'ID', 1, 0, 'C', 1);
$pdf->Cell(40, 10, 'Usuario', 1, 0, 'C', 1);
$pdf->Cell(60, 10, 'Fecha del Registro', 1, 0, 'C', 1);
$pdf->Cell(140, 10, 'Acción', 1, 0, 'C', 1); // Ajustar ancho para el contenido con salto de línea
$pdf->Ln();

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);

// Recorrer los resultados y agregar los datos a la tabla con caracteres ISO-8859-1
while ($row_factura = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    $pdf->Cell(20, 10, $row_factura['id_auditoria'], 1, 0, 'C', 1);
    $pdf->Cell(40, 10, utf8_decode($row_factura['usuario_aud']), 1, 0, 'C', 1); // Convertir a ISO-8859-1
    $pdf->Cell(60, 10, utf8_decode($row_factura['tiemporegistro_aud']), 1, 0, 'C', 1); // Convertir a ISO-8859-1
    $pdf->Cell(140, 10, utf8_decode($row_factura['accion_aud']), 1, 0, 'C', 1); // Convertir a ISO-8859-1 con salto de línea
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output();

// Cierra la conexión
mysqli_close($conexion);
?>

