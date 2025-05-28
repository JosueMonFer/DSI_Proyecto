<?php
require('fpdf.php');

$idMulta             = $_GET['IdMulta'] ?? '';
$dia                 = $_GET['Dia'] ?? '';
$mes                 = $_GET['Mes'] ?? '';
$anio                = $_GET['Anio'] ?? '';
$hora                = $_GET['Hora'] ?? '';
$folioTC             = $_GET['FolioTarjetaCirculacion'] ?? '';
$idOficial           = $_GET['IdOficial'] ?? '';
$folioVerificacion   = $_GET['FolioVerificacion'] ?? '';
$noLicencia          = $_GET['NoLicencia'] ?? '';

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 20);

$pdf->Image('logo_gobierno.png', 10, 8, 30); // Ajustar ruta del logo
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 10, utf8_decode('Gobierno del Estado de Querétaro'), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Secretaría de Seguridad Ciudadana'), 0, 1, 'C');
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(0, 8, utf8_decode('Multa de Tránsito'), 0, 1, 'C');
$pdf->Ln(12);

$pdf->SetFillColor(230, 230, 230);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Información de la Infracción'), 1, 1, 'C', true);

$pdf->SetFont('Arial', '', 12);
$pdf->Cell(95, 10, utf8_decode('Número de Multa: ').$idMulta, 1, 0);
$pdf->Cell(95, 10, utf8_decode('Fecha: ')."$dia/$mes/$anio", 1, 1);

$pdf->Cell(95, 10, utf8_decode('Hora: ').$hora, 1, 0);
$pdf->Cell(95, 10, utf8_decode('Folio Verificación: ').$folioVerificacion, 1, 1);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Datos del Infractor'), 1, 1, 'C', true);
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(95, 10, utf8_decode('Licencia de Conducir: ').$noLicencia, 1, 0);
$pdf->Cell(95, 10, utf8_decode('Tarjeta Circulación: ').$folioTC, 1, 1);
$pdf->Ln(5);

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(0, 10, utf8_decode('Datos del Oficial'), 1, 1, 'C', true);
$pdf->SetFont('Arial', '', 12);

$pdf->Cell(0, 10, utf8_decode('Número de Placa: ').$idOficial, 1, 1);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'I', 10);
$pdf->MultiCell(0, 6, utf8_decode('NOTA: Esta multa deberá ser pagada dentro de los 30 días naturales siguientes a su emisión. El pago podrá realizarse en cualquier módulo de atención ciudadana o a través del portal oficial del gobierno del estado. La no atención a este requerimiento dará lugar a la aplicación de recargos y medidas de ejecución conforme a la legislación vigente.'), 0, 'J');
$pdf->Ln(8);


$pdf->SetY(-25);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 6, utf8_decode('Documento emitido electrónicamente - Validez oficial'), 0, 1, 'C');
$pdf->Cell(0, 6, utf8_decode('Sistema Integral de Movilidad del Estado de México - Versión 1.0'), 0, 0, 'C');

$pdf->Output('I', 'Multa_' . $idMulta . '.pdf');
exit;


?>
