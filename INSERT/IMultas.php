<?php
$IdMulta = $_REQUEST['IdMulta'];
$Dia = $_REQUEST['Dia'];
$Mes = $_REQUEST['Mes'];
$Anio = $_REQUEST['Anio'];
$Hora = $_REQUEST['Hora'];
$FolioTarjetaCirculacion = $_REQUEST['FolioTarjetaCirculacion'];
$IdOficial = $_REQUEST['IdOficial'];
$FolioVerificacion = $_REQUEST['FolioVerificacion'];
$NoLicencia = $_REQUEST['NoLicencia'];

$SQL = "INSERT INTO Multas VALUES ('$IdMulta', '$Dia', '$Mes', '$Anio', '$Hora', '$FolioTarjetaCirculacion', '$IdOficial', '$FolioVerificacion', '$NoLicencia')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoMulta/>');
    
    $xml->addChild('IdMulta', $IdMulta);
    $xml->addChild('Dia', $Dia);
    $xml->addChild('Mes', $Mes);
    $xml->addChild('Anio', $Anio);
    $xml->addChild('Hora', htmlspecialchars($Hora));
    $xml->addChild('FolioTarjetaCirculacion', htmlspecialchars($FolioTarjetaCirculacion));
    $xml->addChild('IdOficial', $IdOficial);
    $xml->addChild('FolioVerificacion', htmlspecialchars($FolioVerificacion));
    $xml->addChild('NoLicencia', $NoLicencia);

    $nombreArchivo = '../RESPALDO/RespaldoMulta_'. $IdMulta. '.xml';
    $xml->asXML($nombreArchivo);
    
    print("Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo);
}
else{
    print("Inserción fallida: ". $Conexion->error);
}

Desconectar($Conexion);
?>