<?php
    $IdConductor = $_POST['IdConductor'];
    $Curp = $_POST['Curp'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $IdDomicilio = $_POST['IdDomicilio'];
    $Folio = $_POST['Folio'];
    $NoEmergencia = $_POST['NoEmergencia'];
    
    $SQL = "INSERT INTO Conductores VALUES ('$IdConductor', '$Curp', '$Nombre', '$Apellido', '$IdDomicilio', '$Folio', '$NoEmergencia')";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    if($ResultSet == 1){
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoConductor/>');
        
        $xml->addChild('IdConductor', $IdConductor);
        $xml->addChild('Curp', htmlspecialchars($Curp));
        $xml->addChild('Nombre', htmlspecialchars($Nombre));
        $xml->addChild('Apellido', htmlspecialchars($Apellido));
        $xml->addChild('IdDomicilio', $IdDomicilio);
        $xml->addChild('Folio', $Folio);
        $xml->addChild('NoEmergencia', $NoEmergencia);
        
        $nombreArchivo = '../RESPALDOS/Conductores/IdConductor_' . $IdConductor . '.xml';
        $xml->asXML($nombreArchivo);
        
        print("Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo);
    }
    else{
        print("Inserción fallida: " . $Conexion->error);
    }
    
    Desconectar($Conexion);
?>