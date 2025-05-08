<?php
//Datos de vista
include("controlador.php");
$Conexion = Conectar();
$SQL = "SELECT * FROM licenciaConducir";
$ResultSet = Ejecutar($Conexion, $SQL);
$Fila = mysqli_fetch_row($ResultSet);
$Cerrar = Desconectar($Conexion);

// Crear PDF
require('fpdf.php');

$pdf = new FPDF('L', 'mm', array(90.5, 50.4));
$pdf->AddPage();
$pdf->SetAutoPageBreak(false);

// Encabezado
$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(5, 2);
$pdf->Cell(0, 2, 'TIPO DE SERVICIO', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(5);
$pdf->Cell(0, 1, 'PARTICULAR', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(30, 2);
$pdf->Cell(0, 2, 'HOLOGRAMA', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(40,2);
$pdf->Cell(0, 2, 'FOLIO', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(40);
$pdf->Cell(0, 1, '178935050', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(55, 2);
$pdf->Cell(0, 2, 'VIGENCIA', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(55);
$pdf->Cell(0, 1, 'INDEFINIDA', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(70, 2);
$pdf->Cell(0, 2, 'PLACA', 0, 1);

$pdf->SetFont('Arial', 'B', 5.5);
$pdf->SetX(70);
$pdf->Cell(0, 2, '2008/SU2943A', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(5, 6);
$pdf->Cell(0, 2, 'PROPIETARIO', 0, 0);

$pdf->SetFont('Arial', '', 4);
$pdf->SetXY(13, 6);
$pdf->Cell(0, 2, 'MONDRAGON FERNANDEZ JOSUE OZIEL', 0, 0);

// Datos deL carro
$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(5, 10);
$pdf->Cell(0, 2, 'RFC', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(5);
$pdf->Cell(0, 1, 'REGF770125HN1', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(5);
$pdf->Cell(0, 2, 'LOCALIDAD', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(5);
$pdf->Cell(0, 1, 'QUERETARO', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27, 10);
$pdf->Cell(0, 2, 'NUMERO DE SERIE', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(27);
$pdf->Cell(0, 1, '3VW2K7AJ4EM123456', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(27);
$pdf->Cell(0, 2, 'MARCA/LINEA/SUBLINEA', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(27);
$pdf->Cell(0, 1, 'VOLKSWAGEN/BEETLE/COUPE', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(62, 10);
$pdf->Cell(0, 2, 'MODELO', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(62);
$pdf->Cell(0, 1, '2014', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(62);
$pdf->Cell(0, 2, 'OPERACION', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(62);
$pdf->Cell(0, 1, '2020/1056773', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(62);
$pdf->Cell(0, 2, 'FOLIO', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(62);
$pdf->Cell(0, 1, 'A    1679305', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(62);
$pdf->Cell(0, 2, 'PLACA ANT.', 0, 1);


$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(5, 17);
$pdf->Cell(0, 2, 'MUNICIPIO', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(5);
$pdf->Cell(0, 1, 'QUERETARO', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(5);
$pdf->Cell(0, 1.8, '', 0, 2);
$pdf->MultiCell(17, 1, 'NUMERO DE CONSTANCIA DE INSCRIPCION', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(5);
$pdf->Cell(0, 2.9, '', 0, 2);
$pdf->Cell(0, 2, 'ORIGEN', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(5);
$pdf->Cell(0, 1, 'EXTRANJERO', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(5);
$pdf->Cell(0, 2, 'COLOR', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(5);
$pdf->Cell(0, 1, 'NEGRO', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27,22);
$pdf->Cell(0, 1, 'CILINDRAJE', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(36,22);
$pdf->Cell(0, 1, '4', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27,23.5);
$pdf->Cell(0, 1, 'CAPACIDAD', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(36,23.5);
$pdf->Cell(0, 1, '750', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27,25);
$pdf->Cell(0, 1, 'PUERTAS', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(36,25);
$pdf->Cell(0, 1, '2', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27,26.5);
$pdf->Cell(0, 1, 'ASIENTOS', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(36,26.5);
$pdf->Cell(0, 1, '3', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27,28);
$pdf->Cell(0, 1, 'COMBUSTIBLE', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(36,28);
$pdf->Cell(0, 1, '1', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(27,29.5);
$pdf->Cell(0, 2, 'TRANSMISION', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(27);
$pdf->Cell(0, 1.5, 'ESTANDAR', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(45,22);
$pdf->Cell(0, 1, 'CVE VEHICULAR', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(45,23.5);
$pdf->Cell(0, 1, '', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(45,25);
$pdf->Cell(0, 1, 'CLASE', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(45,26.5);
$pdf->Cell(0, 1, 'TIPO', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(45,28);
$pdf->Cell(0, 1, 'USO', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(45,29.5);
$pdf->Cell(0, 1, 'RPA', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(52,25);
$pdf->Cell(0, 1, '2', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(52,26.5);
$pdf->Cell(0, 1, '9', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(52,28);
$pdf->Cell(0, 1, '36', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetXY(62,22);
$pdf->Cell(0, 1.6, 'FECHA DE EXPEDICION', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(62);
$pdf->Cell(0, 1.5, '04-MAY-20', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(62);
$pdf->Cell(0, 1.6, 'OFICINA EXPEDIDORA', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(62);
$pdf->Cell(0, 1.6, 'MOVIMIENTO', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(62);
$pdf->Cell(0, 1.5, 'ALTA DE PLACA', 0, 1);

$pdf->SetFont('Arial', '', 3);
$pdf->SetX(62);
$pdf->Cell(0, 1.6, 'NUMERO DE MOTOR', 0, 1);

$pdf->SetFont('Arial', '', 4);
$pdf->SetX(62);
$pdf->Cell(0, 1.5, 'HECHO EN USA', 0, 1);

//Pie de Pagina
$pdf->SetFont('Arial', '', 5.5);
$pdf->SetY(45);
$pdf->Cell(0, 2, 'PODER EJECUTIVO DEL ESTADO DE QUERETARO', 0, 0, 'C');

$pdf->Image('images/qr.png', 73, 34, 15, 15);
$pdf->Image('images/queretaro.png', 5, 34, 14, 14);


$pdf->Output();
?>