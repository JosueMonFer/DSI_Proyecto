<?php
    $IdPropietario = $_GET['IdPropietario'];
    $Nombre = $_GET['Nombre'];
    $Apellido = $_GET['Apellido'];
    $AnioNacimiento = $_GET['AnioNacimiento'];
    $IdVehiculo = $_GET['IdVehiculo'];

    $SQL = "INSERT INTO Propietarios (IdPropietario, Nombre, Apellido, AnioNacimiento, IdVehiculo) VALUES ('$IdPropietario', '$Nombre', '$Apellido', '$AnioNacimiento', '$IdVehiculo')";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    if($ResultSet == 1){
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoPropietario/>');
        
        $xml->addChild('IdPropietario', $IdPropietario);
        $xml->addChild('Nombre', htmlspecialchars($Nombre));
        $xml->addChild('Apellido', htmlspecialchars($Apellido));
        $xml->addChild('AnioNacimiento', $AnioNacimiento);
        $xml->addChild('IdVehiculo', $IdVehiculo);
        
        $nombreArchivo = '../RESPALDOS/Propietarios/IdPropietario_' . $IdPropietario . '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo);
    }
    else{
        print("Inserción fallida: " . $Conexion->error);
    }
    
    Desconectar($Conexion);
?>