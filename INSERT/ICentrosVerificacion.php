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
        $xml = new SimpleXMLElement('<RespaldoCentroVerificacion/>');
        $xml->addChild('IdCenVerificacion', $IdCenVerificacion);
        $xml->addChild('NoLinea', $NoLinea);
        $xml->addChild('Verificacion', $Verificacion);
        $xml->addChild('IdDomicilio', $IdDomicilio);
        
        $nombreArchivo = '../RESPALDO/RespaldoCentro'. $IdCenVerificacion. '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. ". "Respaldo XML creado en: ". $nombreArchivo);
    } else {
        print("Inserción fallida: ". $Conexion->error);
    }

    Desconectar($Conexion);
?>