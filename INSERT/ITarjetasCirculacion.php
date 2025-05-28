<?php
$FolioTarjetaCirculacion = $_REQUEST['FolioTarjetaCirculacion'];
$Holograma = $_REQUEST['Holograma'];
$Vigencia = $_REQUEST['Vigencia'];
$Rfc = $_REQUEST['Rfc'];
$Localidad = $_REQUEST['Localidad'];
$Municipio = $_REQUEST['Municipio'];
$FechaExpedicion = $_REQUEST['FechaExpedicion'];
$CveVehicular = $_REQUEST['CveVehicular'];
$IdVehiculo = $_REQUEST['IdVehiculo'];
$IdPropietario = $_REQUEST['IdPropietario'];

$SQL = "INSERT INTO TarjetasCirculacion(FolioTarjetaCirculacion, Holograma, Vigencia, Rfc, Localidad, Municipio, FechaExpedicion, CveVehicular, IdVehiculo, IdPropietario) VALUES ('$FolioTarjetaCirculacion', '$Holograma', '$Vigencia', '$Rfc', '$Localidad', '$Municipio', '$FechaExpedicion', '$CveVehicular', '$IdVehiculo', '$IdPropietario')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoTarjetaCirculacion/>');
    
    $xml->addChild('FolioTarjetaCirculacion', $FolioTarjetaCirculacion);
    $xml->addChild('Holograma', htmlspecialchars($Holograma));
    $xml->addChild('Vigencia', $Vigencia);
    $xml->addChild('Rfc', $Rfc);
    $xml->addChild('Localidad', htmlspecialchars($Localidad));
    $xml->addChild('Municipio', htmlspecialchars($Municipio));
    $xml->addChild('FechaExpedicion', $FechaExpedicion);
    $xml->addChild('CveVehicular', $CveVehicular);
    $xml->addChild('IdVehiculo', $IdVehiculo);
    $xml->addChild('IdPropietario', $IdPropietario);

    $nombreArchivo = '../RESPALDOS/TarjetasCirculacion/FolioCirculacion_'. $FolioTarjetaCirculacion. '.xml';
    $xml->asXML($nombreArchivo);
    
    $mensaje = "Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo;
}
else{
    $mensaje = "Inserción fallida: ". $Conexion->error;
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