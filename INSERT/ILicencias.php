<?php
// Directorio
$directorio = __DIR__ . '/../uploads/';

// Crear carpeta si no existe
if (!is_dir($directorio)) {
    mkdir($directorio, 0777, true);
}

// Subir Fotografía
if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] == 0) {
    $ext = pathinfo($_FILES['Foto']['name'], PATHINFO_EXTENSION);
    $nuevoNombreFoto = 'foto_' . uniqid() . '.' . $ext;
    $rutaFoto = $directorio . $nuevoNombreFoto;
    move_uploaded_file($_FILES['Foto']['tmp_name'], $rutaFoto);
} else {
    echo "Error al subir fotografía<br>";
    $nuevoNombreFoto = '';
}

// Subir Firma
if (isset($_FILES['Firma']) && $_FILES['Firma']['error'] == 0) {
    $extFirma = pathinfo($_FILES['Firma']['name'], PATHINFO_EXTENSION);
    $nuevoNombreFirma = 'firma_' . uniqid() . '.' . $extFirma;
    $rutaFirma = $directorio . $nuevoNombreFirma;
    move_uploaded_file($_FILES['Firma']['tmp_name'], $rutaFirma);
} else {
    echo "Error al subir firma<br>";
    $nuevoNombreFirma = '';
}

$NoLicencia = $_POST['NoLicencia'];
$Nombre = $_POST['Nombre'];
$Foto = $nuevoNombreFoto; 
$Observacion = $_POST['Observacion'];
$FechaNac = $_POST['FechaNac'];
$FechaExped = $_POST['FechaExped'];
$FechaValid = $_POST['FechaValid'];
$Antiguedad = $_POST['Antiguedad'];
$Firma = $nuevoNombreFirma;
$IdDomicilio = $_POST['IdDomicilio'];
$Restriccion = $_POST['Restriccion'];
$GrupoSanguineo = $_POST['GrupoSanguineo'];
$DonadorOrgano = $_POST['DonadorOrgano'];
$NoEmergencia = $_POST['NoEmergencia'];
$IdConductor = $_POST['IdConductor'];

$SQL = "INSERT INTO Licencias VALUES (
    '$NoLicencia', 
    '$Nombre', 
    '$nuevoNombreFoto',
    '$Observacion', 
    '$FechaNac', 
    '$FechaExped', 
    '$FechaValid', 
    '$Antiguedad',
    '$nuevoNombreFirma', 
    '$IdDomicilio', 
    '$Restriccion', 
    '$GrupoSanguineo', 
    '$DonadorOrgano', 
    '$NoEmergencia', 
    '$IdConductor'
)";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoLicencia/>');
    
    $xml->addChild('NoLicencia', $NoLicencia);
    $xml->addChild('Nombre', htmlspecialchars($Nombre));
    $xml->addChild('Foto', htmlspecialchars($Foto));
    $xml->addChild('Observacion', htmlspecialchars($Observacion));
    $xml->addChild('FechaNac', $FechaNac);
    $xml->addChild('FechaExped', $FechaExped);
    $xml->addChild('FechaValid', $FechaValid);
    $xml->addChild('Antiguedad', $Antiguedad);
    $xml->addChild('IdDomicilio', $IdDomicilio);
    $xml->addChild('Restriccion', htmlspecialchars($Restriccion));
    $xml->addChild('GrupoSanguineo', $GrupoSanguineo);
    $xml->addChild('DonadorOrgano', $DonadorOrgano);
    $xml->addChild('NoEmergencia', $NoEmergencia);
    $xml->addChild('IdConductor', $IdConductor);

    $nombreArchivo = '../RESPALDOS/Licencias/IdLicencia_'. $NoLicencia. '.xml';
    $xml->asXML($nombreArchivo);
    
    $mensaje ="Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo;
}
else{
    $mensaje ="Inserción fallida: ". $Conexion->error;
}

Desconectar($Conexion);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de inserción</title>
    <style>
        .contenedor {
            text-align: center;
            margin-top: 50px;
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }

        .botonEnviar {
        align-items: center;
        gap: 8px;
        padding: 12px 25px;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
        }

        .botonEnviar:hover {
            background: #34495e;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <p><?php echo htmlspecialchars($mensaje); ?></p>
        <button class="botonEnviar" onclick="history.back()">Regresar</button>
    </div>
</body>
</html>