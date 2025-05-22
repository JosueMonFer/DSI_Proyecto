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
    // Generar XML
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

    $nombreArchivo = '../RESPALDO/RespaldoTarjeta_'. $FolioTarjetaCirculacion. '.xml';
    $xml->asXML($nombreArchivo);
    
    print("Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo);
}
else{
    print("Inserción fallida: ". $Conexion->error);
}

Desconectar($Conexion);
?>