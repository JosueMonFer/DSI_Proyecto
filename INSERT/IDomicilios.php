<?php
    $IdDomicilio = $_GET['IdDomicilio'];
    $Calle = $_GET['Calle'];
    $Colonia = $_GET['Colonia'];
    $NoExterior = $_GET['NoExterior'];
    $Cp = $_GET['Cp'];
    $Municipio = $_GET['Municipio'];
    $Estado = $_GET['Estado'];

    $SQL = "INSERT INTO Domicilios VALUES ('$IdDomicilio', '$Calle', '$Colonia', '$NoExterior', '$Cp', '$Municipio', '$Estado')";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    if($ResultSet == 1){
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoDomicilio/>');
        
        $xml->addChild('IdDomicilio', $IdDomicilio);
        $xml->addChild('Calle', htmlspecialchars($Calle));
        $xml->addChild('Colonia', htmlspecialchars($Colonia));
        $xml->addChild('NoExterior', $NoExterior);
        $xml->addChild('Cp', $Cp);
        $xml->addChild('Municipio', htmlspecialchars($Municipio));
        $xml->addChild('Estado', htmlspecialchars($Estado));
        
        $nombreArchivo = '../RESPALDOS/Domicilios/IdDomicilio_' . $IdDomicilio . '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo);
    }
    else{
        print("Inserción fallida: " . $Conexion->error);
    }
    
    Desconectar($Conexion);
?>