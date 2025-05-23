<?php
$FolioVerificacion = $_GET['FolioVerificacion'];
$IdVehiculo = $_GET['IdVehiculo'];
$Entidad = $_GET['Entidad'];
$Municipio = $_GET['Municipio'];
$IdCenVerificacion = $_GET['IdCenVerificacion'];
$NoLineaVerificacion = $_GET['NoLineaVerificacion'];
$TecnicoVerificador = $_GET['TecnicoVerificador'];
$FechaExpedicion = $_GET['FechaExpedicion'];
$HoraEntrada = $_GET['HoraEntrada'];
$HoraSalida = $_GET['HoraSalida'];
$MotivoVerificacion = $_GET['MotivoVerificacion'];
$Semestre = $_GET['Semestre'];
$Vigencia = $_GET['Vigencia'];
$CodigoBarra = $_GET['CodigoBarra'];
$CodigoQR = $_GET['CodigoQR'];

$SQL = "INSERT INTO TarjetasdeVerificacion(FolioVerificacion, IdVehiculo, Entidad, Municipio, IdCenVerificacion, NoLineaVerificacion, TecnicoVerificador, FechaExpedicion, HoraEntrada, HoraSalida, MotivoVerificacion, Semestre, Vigencia, CodigoBarra, CodigoQR) VALUES ('$FolioVerificacion', '$IdVehiculo', '$Entidad', '$Municipio', '$IdCenVerificacion', '$NoLineaVerificacion', '$TecnicoVerificador', '$FechaExpedicion', '$HoraEntrada', '$HoraSalida', '$MotivoVerificacion', '$Semestre', '$Vigencia', '$CodigoBarra', '$CodigoQR')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoTarjetaVerificacion/>');
    
    $xml->addChild('FolioVerificacion', $FolioVerificacion);
    $xml->addChild('IdVehiculo', $IdVehiculo);
    $xml->addChild('Entidad', htmlspecialchars($Entidad));
    $xml->addChild('Municipio', htmlspecialchars($Municipio));
    $xml->addChild('IdCenVerificacion', $IdCenVerificacion);
    $xml->addChild('NoLineaVerificacion', $NoLineaVerificacion);
    $xml->addChild('TecnicoVerificador', htmlspecialchars($TecnicoVerificador));
    $xml->addChild('FechaExpedicion', $FechaExpedicion);
    $xml->addChild('HoraEntrada', $HoraEntrada);
    $xml->addChild('HoraSalida', $HoraSalida);
    $xml->addChild('MotivoVerificacion', htmlspecialchars($MotivoVerificacion));
    $xml->addChild('Semestre', $Semestre);
    $xml->addChild('Vigencia', $Vigencia);
    $xml->addChild('CodigoBarra', htmlspecialchars($CodigoBarra));
    $xml->addChild('CodigoQR', htmlspecialchars($CodigoQR));

    $nombreArchivo = '../RESPALDOS/TarjetasVerificacion/FolioVerificacion_'. $FolioVerificacion. '.xml';
    $xml->asXML($nombreArchivo);
    
    print("Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo);
}
else{
    print("Inserción fallida: ". $Conexion->error);
}

Desconectar($Conexion);
?>