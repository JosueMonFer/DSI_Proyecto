<?php

require('/Applications/XAMPP/xamppfiles/htdocs/Proyecto/DSI_Proyecto/PRUEBAS/fpdf.php'); // Asegúrate de ajustar esta ruta
include("../controlador.php");

// Configuración de directorios
$uploadDir = __DIR__ . '/../uploads/';
$pdfDir = __DIR__ . '/../licencias_generadas/';
$xmlDir = __DIR__ . '/../RESPALDOS/Licencias/';

// Crear directorios si no existen
foreach ([$uploadDir, $pdfDir, $xmlDir] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

// Clase PDF personalizada
class LicenciaPDF extends FPDF {
    function Header() {
        // Fondo de licencia (opcional)
        if (file_exists('../img/fondo_licencia.jpg')) {
            $this->Image('../img/fondo_licencia.jpg', 0, 0, 210, 150);
        }
        
        // Encabezado
        $this->SetFont('Arial', 'B', 18);
        $this->Cell(0, 10, 'LICENCIA DE CONDUCIR', 0, 1, 'C');
        $this->Ln(10);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, 'Documento oficial - Valido con identificación', 0, 0, 'C');
    }
}

// Procesar archivos subidos
$nuevoNombreFoto = $nuevoNombreFirma = '';
$errores = [];

try {
    // Procesar fotografía
    if (empty($_FILES['Foto']['tmp_name'])) {
        throw new Exception('Debe subir una fotografía');
    }
    $fotoInfo = getimagesize($_FILES['Foto']['tmp_name']);
    if (!$fotoInfo) {
        throw new Exception('Archivo de foto no válido');
    }
    $fotoExt = pathinfo($_FILES['Foto']['name'], PATHINFO_EXTENSION);
    $nuevoNombreFoto = 'foto_' . uniqid() . '.' . $fotoExt;
    move_uploaded_file($_FILES['Foto']['tmp_name'], $uploadDir . $nuevoNombreFoto);

    // Procesar firma
    if (empty($_FILES['Firma']['tmp_name'])) {
        throw new Exception('Debe subir una firma');
    }
    $firmaInfo = getimagesize($_FILES['Firma']['tmp_name']);
    if (!$firmaInfo) {
        throw new Exception('Archivo de firma no válido');
    }
    $firmaExt = pathinfo($_FILES['Firma']['name'], PATHINFO_EXTENSION);
    $nuevoNombreFirma = 'firma_' . uniqid() . '.' . $firmaExt;
    move_uploaded_file($_FILES['Firma']['tmp_name'], $uploadDir . $nuevoNombreFirma);

    // Recoger y sanitizar datos
    $datos = [
        'NoLicencia' => filter_input(INPUT_POST, 'NoLicencia', FILTER_SANITIZE_NUMBER_INT),
        'Nombre' => filter_input(INPUT_POST, 'Nombre', FILTER_SANITIZE_STRING),
        'Observacion' => filter_input(INPUT_POST, 'Observacion', FILTER_SANITIZE_STRING),
        'FechaNac' => filter_input(INPUT_POST, 'FechaNac', FILTER_SANITIZE_STRING),
        'FechaExped' => filter_input(INPUT_POST, 'FechaExped', FILTER_SANITIZE_STRING),
        'FechaValid' => filter_input(INPUT_POST, 'FechaValid', FILTER_SANITIZE_STRING),
        'Antiguedad' => filter_input(INPUT_POST, 'Antiguedad', FILTER_SANITIZE_NUMBER_INT),
        'IdDomicilio' => filter_input(INPUT_POST, 'IdDomicilio', FILTER_SANITIZE_NUMBER_INT),
        'Restriccion' => filter_input(INPUT_POST, 'Restriccion', FILTER_SANITIZE_STRING),
        'GrupoSanguineo' => filter_input(INPUT_POST, 'GrupoSanguineo', FILTER_SANITIZE_STRING),
        'DonadorOrgano' => filter_input(INPUT_POST, 'DonadorOrgano', FILTER_SANITIZE_STRING),
        'NoEmergencia' => filter_input(INPUT_POST, 'NoEmergencia', FILTER_SANITIZE_NUMBER_INT),
        'IdConductor' => filter_input(INPUT_POST, 'IdConductor', FILTER_SANITIZE_NUMBER_INT)
    ];

    // Insertar en base de datos
    $Conexion = Conectar();
    $SQL = "INSERT INTO Licencias VALUES (
        '{$datos['NoLicencia']}', 
        '{$datos['Nombre']}', 
        '$nuevoNombreFoto',
        '{$datos['Observacion']}', 
        '{$datos['FechaNac']}', 
        '{$datos['FechaExped']}', 
        '{$datos['FechaValid']}', 
        '{$datos['Antiguedad']}',
        '$nuevoNombreFirma', 
        '{$datos['IdDomicilio']}', 
        '{$datos['Restriccion']}', 
        '{$datos['GrupoSanguineo']}', 
        '{$datos['DonadorOrgano']}', 
        '{$datos['NoEmergencia']}', 
        '{$datos['IdConductor']}'
    )";

    $ResultSet = Ejecutar($Conexion, $SQL);

    if ($ResultSet == 1) {
        // Generar XML
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoLicencia/>');
        foreach ($datos as $clave => $valor) {
            $xml->addChild($clave, htmlspecialchars($valor));
        }
        $xml->addChild('Foto', $nuevoNombreFoto);
        $xml->addChild('Firma', $nuevoNombreFirma);
        $xmlPath = $xmlDir . 'IdLicencia_' . $datos['NoLicencia'] . '.xml';
        $xml->asXML($xmlPath);

        // Generar PDF
        $pdf = new LicenciaPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        
        // Insertar imágenes
        $pdf->Image($uploadDir . $nuevoNombreFoto, 20, 40, 35, 45); // Foto 3.5x4.5 cm
        $pdf->Image($uploadDir . $nuevoNombreFirma, 20, 90, 40, 15); // Firma

        // Datos principales
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetXY(60, 40);
        $pdf->Cell(0, 10, utf8_decode('Nombre: ') . utf8_decode($datos['Nombre']));
        
        $pdf->SetXY(60, 50);
        $pdf->Cell(0, 10, 'Nacimiento: ' . date('d/m/Y', strtotime($datos['FechaNac'])));
        
        $pdf->SetXY(60, 60);
        $pdf->Cell(0, 10, 'Expedición: ' . date('d/m/Y', strtotime($datos['FechaExped'])));
        
        // Columna derecha
        $pdf->SetXY(140, 40);
        $pdf->Cell(0, 10, 'Licencia #: ' . $datos['NoLicencia']);
        
        $pdf->SetXY(140, 50);
        $pdf->Cell(0, 10, 'Vencimiento: ' . date('d/m/Y', strtotime($datos['FechaValid'])));
        
        // Detalles adicionales
        $pdf->SetY(100);
        $pdf->MultiCell(0, 8, utf8_decode('Restricciones: ') . utf8_decode($datos['Restriccion']));
        $pdf->Cell(0, 8, utf8_decode('Grupo Sanguíneo: ') . $datos['GrupoSanguineo']);
        $pdf->Ln();
        $pdf->Cell(0, 8, utf8_decode('Donador de Órganos: ') . utf8_decode($datos['DonadorOrgano']));

        // Guardar y enviar PDF
        $pdfPath = $pdfDir . 'licencia_' . $datos['NoLicencia'] . '.pdf';
        $pdf->Output($pdfPath, 'F');
        $pdf->Output('D', 'licencia_conducir.pdf');

        echo "Operación exitosa. Archivos generados:";
        echo "<br>- XML: " . basename($xmlPath);
        echo "<br>- PDF: " . basename($pdfPath);
        
    } else {
        throw new Exception('Error en base de datos: ' . $Conexion->error);
    }

    Desconectar($Conexion);

} catch (Exception $e) {
    // Limpiar archivos subidos en caso de error
    if (file_exists($uploadDir . $nuevoNombreFoto)) unlink($uploadDir . $nuevoNombreFoto);
    if (file_exists($uploadDir . $nuevoNombreFirma)) unlink($uploadDir . $nuevoNombreFirma);
    
    http_response_code(400);
    die('Error: ' . $e->getMessage());
}
?>
