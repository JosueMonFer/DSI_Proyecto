<?php
    $IdOficial = $_REQUEST['IdOficial'];
    $Cargo = $_REQUEST['Cargo'];
    $Nombre = $_REQUEST['Nombre'];
    $Apellido = $_REQUEST['Apellido'];

    $SQL = "INSERT INTO Oficiales VALUES ('$IdOficial', '$Cargo', '$Nombre', '$Apellido')";

    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    if($ResultSet == 1){
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoOficial/>');
        
        $xml->addChild('IdOficial', $IdOficial);
        $xml->addChild('Cargo', htmlspecialchars($Cargo));
        $xml->addChild('Nombre', htmlspecialchars($Nombre));
        $xml->addChild('Apellido', htmlspecialchars($Apellido));
        
        $nombreArchivo = '../RESPALDOS/Oficiales/IdOficial_' . $IdOficial . '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo);
    }
    else{
        print("Inserción fallida: " . $Conexion->error);
    }
    
    Desconectar($Conexion);
?>