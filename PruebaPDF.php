<?php
//Obtener datos de la vista
include("controlador.php");
$Conexion = Conectar();
$SQL = "SELECT * FROM licenciaConducir";
$ResultSet = Ejecutar($Conexion, $SQL);
$Fila = mysqli_fetch_row($ResultSet);
$Cerrar = Desconectar($Conexion);

//Crear PDF
require('fpdf.php');

$pdf = new FPDF('P', 'mm', array(85.6, 50.5));
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);

//Encabezado
$pdf->SetFont('Arial', '', 4.5);
$pdf->SetXY(15, 2);
$pdf->Cell(0, 2, 'Estados Unidos Mexicanos', 0, 1);

$pdf->SetX(15);
$pdf->Cell(0, 1.5, 'Poder Ejecutivo del Estado de Queretaro', 0, 1);

$pdf->SetFont('Arial', 'B', 4.5);
$pdf->SetX(15);
$pdf->Cell(0, 3, 'Secretaria de Seguridad Ciudadana', 0, 1);

$pdf->SetFont('Arial', 'B', 5);
$pdf->SetX(15);
$pdf->Cell(0, 1, 'Licencia para conducir', 0, 1);

$pdf->Image('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/Coat_of_arms_of_Queretaro.svg/1200px-Coat_of_arms_of_Queretaro.svg.png', 3, 2, 10, 10);

// Número de licencia
$pdf->SetFont('Arial', '', 2.5);
$pdf->SetXY(17.5, 25);
$pdf->Cell(0, 4, 'No. de Licencia', 0, 1);

$pdf->SetFont('Arial', 'B', 7);
$pdf->SetTextColor(255, 0, 0);
$pdf->SetX(9.2);
$pdf->Cell(0, 2, $Fila[0], 0, 1);

$pdf->SetFont('Arial', 'B', 3);
$pdf->SetTextColor(0, 0, 0);
$pdf->SetX(14.6);
$pdf->Cell(0, 3, 'AUTOMOVILISTA', 0, 1);

//Datos del conductor
$pdf->SetFont('Arial', '', 2.5);
$pdf->SetXY(41,35);
$pdf->Cell(0, 2, 'Nombre', 0, 1);

$pdf->SetFont('Arial', '', 7.2);
$pdf->SetX(31.3);
$pdf->MultiCell(15, 2.5, $Fila[1], 0, 'R');

$pdf->SetFont('Arial', 'B', 7.2);
$pdf->SetX(29.8);
$pdf->Cell(0, 3.5, 'COLORADO', 0, 'R');

$pdf->Image('images/chapulin.jpg', 26, 15, 19, 19);

$pdf->SetFont('Arial', '', 2.5);
$pdf->SetX(38.3);
$pdf->Cell(0, 0, 'Observaciones', 0, 1);

// Datos de la licencia
$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(3, 50);
$pdf->Cell(0, 3, 'Fecha de Nacimiento', 0, 1);

$pdf->SetFont('Arial', '', 5);
$pdf->SetX(2.9);
$pdf->Cell(0, 1, '02/11/1980', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(3);
$pdf->Cell(0, 3, 'Fecha de Expedicion', 0, 1);

$pdf->SetFont('Arial', '', 5);
$pdf->SetX(2.9);
$pdf->Cell(0, 1, '24/09/2020', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(3);
$pdf->Cell(0, 3, 'Valida hasta', 0, 1);

$pdf->SetFont('Arial', 'B', 5);
$pdf->SetX(2.9);
$pdf->Cell(0, 1, '24/09/2025', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(3);
$pdf->Cell(0, 3, 'Antiguedad', 0, 1);

$pdf->SetFont('Arial', '', 5);
$pdf->SetX(2.9);
$pdf->Cell(0, 1, '15', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(21,58.5);
$pdf->Cell(0, 3, 'Firma', 0, 1);

//Pie de pagina
$pdf->SetFont('Arial', '', 2.5);
$pdf->SetY(80);
$pdf->Cell(0, 2, 'AUTORIZO QUE LA PRESENTE SEA', 0, 0, 'C');
$pdf->SetY(81);
$pdf->Cell(0, 2, 'RECABADA COMO GARANTIA DE INFRACCION', 0, 0, 'C');

$pdf->SetFont('Arial', '', 8);
$pdf->SetXY(4,72.4);
$pdf->Cell(10, 10, 'A', 1, 1, 'C');


$pdf->Output();
?>