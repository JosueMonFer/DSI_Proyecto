<?php
    $IdVehiculo = $_REQUEST['IdVehiculo'];
    $Cilindro = $_REQUEST['Cilindro'];
    $Combustible = $_REQUEST['Combustible'];
    $Llanta = $_REQUEST['Llanta'];
    $Asiento = $_REQUEST['Asiento'];
    $Holograma = $_REQUEST['Holograma'];
    $Color = $_REQUEST['Color'];
    $Puerta = $_REQUEST['Puerta'];
    $Modelo = $_REQUEST['Modelo'];
    $Submarca = $_REQUEST['Submarca'];
    $Placa = $_REQUEST['Placa'];
    $NumeroSerie = $_REQUEST['NumeroSerie'];
    $Clase = $_REQUEST['Clase'];
    $Carroceria = $_REQUEST['Carroceria'];
    $TipoServicio = $_REQUEST['TipoServicio'];
    $NumeroMotor = $_REQUEST['NumeroMotor'];
    $Transmision = $_REQUEST['Transmision'];

    $SQL = "INSERT INTO Vehiculos(IdVehiculo, Cilindro, Combustible, Llanta, Asiento, Holograma, Color, Puerta, Modelo, Submarca, Placa, NumeroSerie, Clase, Carroceria, TipoServicio, NumeroMotor, Transmision) VALUES ('$IdVehiculo', '$Cilindro', '$Combustible', '$Llanta', '$Asiento', '$Holograma', '$Color', '$Puerta', '$Modelo', '$Submarca', '$Placa', '$NumeroSerie', '$Clase', '$Carroceria', '$TipoServicio', '$NumeroMotor', '$Transmision')";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    if($ResultSet == 1){
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoVehiculo/>');
        
        $xml->addChild('IdVehiculo', $IdVehiculo);
        $xml->addChild('Cilindro', $Cilindro);
        $xml->addChild('Combustible', htmlspecialchars($Combustible));
        $xml->addChild('Llanta', $Llanta);
        $xml->addChild('Asiento', $Asiento);
        $xml->addChild('Holograma', htmlspecialchars($Holograma));
        $xml->addChild('Color', htmlspecialchars($Color));
        $xml->addChild('Puerta', $Puerta);
        $xml->addChild('Modelo', htmlspecialchars($Modelo));
        $xml->addChild('Submarca', htmlspecialchars($Submarca));
        $xml->addChild('Placa', htmlspecialchars($Placa));
        $xml->addChild('NumeroSerie', htmlspecialchars($NumeroSerie));
        $xml->addChild('Clase', htmlspecialchars($Clase));
        $xml->addChild('Carroceria', htmlspecialchars($Carroceria));
        $xml->addChild('TipoServicio', htmlspecialchars($TipoServicio));
        $xml->addChild('NumeroMotor', htmlspecialchars($NumeroMotor));
        $xml->addChild('Transmision', htmlspecialchars($Transmision));
        
        $nombreArchivo = '../RESPALDOS/Vehiculos/IdVehiculo_' . $IdVehiculo . '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo);
    }
    else{
        print("Inserción fallida: " . $Conexion->error);
    }
    
    Desconectar($Conexion);
?>