<?php
$IdPago = $_POST['IdPago'];
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$FechaNacimiento = $_POST['FechaNacimiento'];
$FechaExpedicion = $_POST['FechaExpedicion'];
$FechaValidacion = $_POST['FechaValidacion'];
$Monto = $_POST['Monto'];
$Firma = $_POST['Firma'];
$FolioTarjetaCirculacion = $_POST['FolioTarjetaCirculacion'];

$SQL = "INSERT INTO Pagos (IdPago, Nombre, Apellido, FechaNacimiento, FechaExpedicion, FechaValidacion, Monto, Firma, FolioTarjetaCirculacion) VALUES ('$IdPago', '$Nombre', '$Apellido', '$FechaNacimiento', '$FechaExpedicion', '$FechaValidacion', '$Monto', '$Firma', '$FolioTarjetaCirculacion')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoPago/>');
    
    $xml->addChild('IdPago', $IdPago);
    $xml->addChild('Nombre', htmlspecialchars($Nombre));
    $xml->addChild('Apellido', htmlspecialchars($Apellido));
    $xml->addChild('FechaNacimiento', $FechaNacimiento);
    $xml->addChild('FechaExpedicion', $FechaExpedicion);
    $xml->addChild('FechaValidacion', $FechaValidacion);
    $xml->addChild('Monto', $Monto);
    $xml->addChild('Firma', htmlspecialchars($Firma));
    $xml->addChild('FolioTarjetaCirculacion', $FolioTarjetaCirculacion);

    $nombreArchivo = '../RESPALDO/RespaldoPago_'. $IdPago. '.xml';
    $xml->asXML($nombreArchivo);
    
    print("Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo);
}
else{
    print("Inserción fallida: ". $Conexion->error);
}

Desconectar($Conexion);
?>