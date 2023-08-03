<?php
require "../php/seguridad.php";
require "../php/conexion.php";

// Incluir la librería FPDF
require "../fpdf/fpdf.php";

// Obtener los datos del usuario desde $_SESSION
$nombre_usuario = $_SESSION['nombre_usuario'];
$apellido_usuario = $_SESSION['apellido_usuario'];

// Consulta para obtener los datos de los productos
$sql_facturas = "SELECT p.codigo, c.clasificacion, p.descripcion, p.observaciones, p.costo, p.existencia, pr.nombre_proveedor FROM tbl_productos p JOIN tbl_clasificacion c ON p.id_clasificacion = c.id_clasificacion JOIN tbl_proveedores pr ON p.id_proveedor = pr.id_proveedor";

// Ejecutar la consulta y obtener los resultados
$resultado = mysqli_query($conexion, $sql_facturas) or die("Error al consultar productos: " . mysqli_error($conexion));

// Crear un nuevo PDF
$pdf = new FPDF();
$pdf->AddPage('L');

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

// Agregar el encabezado del PDF
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, 'Reporte General deProductos', 0, 1, 'C');
$pdf->Ln(10);

// Agregar los datos de los productos en una tabla
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 10, 'Codigo', 1);
$pdf->Cell(40, 10, 'Clasificacion', 1);
$pdf->Cell(60, 10, 'Descripcion', 1);
$pdf->Cell(20, 10, 'Costo', 1);
$pdf->Cell(30, 10, 'Existencia', 1);
$pdf->Cell(60, 10, 'Proveedor', 1);
$pdf->Ln();

// Recorrer los resultados y agregar los datos a la tabla
while ($row_factura = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
    $pdf->Cell(30, 10, $row_factura['codigo'], 1);
    $pdf->Cell(40, 10, $row_factura['clasificacion'], 1);
    $pdf->Cell(60, 10, $row_factura['descripcion'], 1);
    $pdf->Cell(20, 10, $row_factura['costo'], 1);
    $pdf->Cell(30, 10, $row_factura['existencia'], 1);
    $pdf->Cell(60, 10, $row_factura['nombre_proveedor'], 1);
    $pdf->Ln();
}

// Salida del PDF
$pdf->Output();

// Cierra la conexión
mysqli_close($conexion);
?>