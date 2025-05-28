<?php
    $IdCenVerificacion = $_POST['IdCenVerificacion'];
    $NoLinea = $_POST['NoLinea'];
    $Verificacion = $_POST['Verificacion'];
    $IdDomicilio = $_POST['IdDomicilio'];

    $SQL = "INSERT INTO CentrosVerificacion VALUES ('$IdCenVerificacion', '$NoLinea', '$Verificacion', '$IdDomicilio')";

    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);
    
    if ($ResultSet == 1) {
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoCentroVerificacion/>');
        
        $xml->addChild('IdCenVerificacion', $IdCenVerificacion);
        $xml->addChild('NoLinea', $NoLinea);
        $xml->addChild('Verificacion', htmlspecialchars($Verificacion));
        $xml->addChild('IdDomicilio', $IdDomicilio);
        
        $nombreArchivo = '../RESPALDOS/CentrosVerificacion/IdCenVerificacion_' . $IdCenVerificacion . '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo);
    } else {
        print("Inserción fallida: ". $Conexion->error);
    }

    Desconectar($Conexion);
?>