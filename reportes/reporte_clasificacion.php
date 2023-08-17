<?php
require "../php/seguridad.php";
require "../php/conexion.php";

// Incluir la librería FPDF
require "../fpdf/fpdf.php";

// Obtener los datos del usuario desde $_SESSION
$nombre_usuario = $_SESSION['nombre_usuario'];
$apellido_usuario = $_SESSION['apellido_usuario'];

// Consulta para obtener los datos de los productos
$sql_facturas = "SELECT clasificacion FROM tbl_clasificacion;";

// Ejecutar la consulta y obtener los resultados
$resultado = mysqli_query($conexion, $sql_facturas) or die("Error al consultar clasificacion: " . mysqli_error($conexion));

$fecha = date("Y-m-d");

// Crear un nuevo PDF
$pdf = new FPDF('L', 'mm', 'A4'); 
$pdf->AddPage('P', 'Letter');

// Ruta de la imagen que deseas agregar al PDF
$imagen = '../img/logoalas.png'; 

// Coordenadas donde deseas ubicar la imagen en el PDF
$posX = 180;
$posY = -4;

// Ancho y alto de la imagen en el PDF
$ancho = 40;
$alto = 40;



// Agregar el encabezado del PDF
$pdf->SetFillColor(253, 135, 39);
$pdf->Rect(0, 0, 300, 30, 'F');
$pdf->SetY(12); 
$pdf->SetFont('Arial', 'B', 20);
$pdf->SetTextColor(255, 255, 255);
$pdf->Write(5, utf8_decode('Reporte de Clasificaciones al ' . $fecha));
$pdf->Ln(25);

// Agregar la imagen al PDF
$pdf->Image($imagen, $posX, $posY, $ancho, $alto);

// Agregar los datos de los productos en una tabla
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->SetFillColor(79, 78, 77);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(100, 10, utf8_decode('Clasificacion'), 1, 0, 'C', 1);
$pdf->Ln();

$pdf->SetTextColor(0, 0, 0);
$pdf->SetFillColor(255, 255, 255);

// Recorrer los resultados y agregar los datos a la tabla
while ($row_factura = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    $pdf->Cell(100, 10, $row_factura['clasificacion'], 1, 0, 'C', 1);
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output();

?>

<?php 
require "../php/conexion.php";
session_start();
$usuario = $_SESSION['login_usuario'];

// Obtener la fecha actual
  $fecha = date("Y-m-d");

  // Construir la consulta de inserción en tbl_auditoria
  $sql_aud = "INSERT INTO tbl_auditoria (usuario_aud, tiemporegistro_aud, accion_aud) VALUES ('$usuario', '$fecha', 'El usuario [$usuario] generó un reporte general de Clasificaciones')";

  $auditoria = mysqli_query($conexion, $sql_aud);

  // Cierra la conexión
  mysqli_close($conexion);
?>