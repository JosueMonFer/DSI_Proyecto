<?php
$NoLicencia = $_POST['NoLicencia'];
$Nombre = $_POST['Nombre'];
$Observacion = $_POST['Observacion'];
$FechaNac = $_POST['FechaNac'];
$FechaExped = $_POST['FechaExped'];
$FechaValid = $_POST['FechaValid'];
$Antiguedad = $_POST['Antiguedad'];
$IdDomicilio = $_POST['IdDomicilio'];
$Restriccion = $_POST['Restriccion'];
$GrupoSanguineo = $_POST['GrupoSanguineo'];
$DonadorOrgano = $_POST['DonadorOrgano'];
$NoEmergencia = $_POST['NoEmergencia'];
$IdConductor = $_POST['IdConductor'];

$SQL = "INSERT INTO Licencias VALUES (
    '$NoLicencia', 
    '$Nombre', 
    '$Observacion', 
    '$FechaNac', 
    '$FechaExped', 
    '$FechaValid', 
    '$Antiguedad', 
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

    $nombreArchivo = '../RESPALDO/RespaldoLicencia_'. $NoLicencia. '.xml';
    $xml->asXML($nombreArchivo);
    
    print("Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo);
}
else{
    print("Inserción fallida: ". $Conexion->error);
}

Desconectar($Conexion);
?>