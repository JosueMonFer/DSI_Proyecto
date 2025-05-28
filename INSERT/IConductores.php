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
        
        $mensaje = "Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo;
    }
    else{
        $mensaje = "Inserción fallida: " . $Conexion->error;
    }
    
    Desconectar($Conexion);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de inserción</title>
    <style>
        .contenedor {
            text-align: center;
            margin-top: 50px;
        }
        button {
            padding: 10px 20px;
            margin-top: 20px;
            cursor: pointer;
        }

        .botonEnviar {
        align-items: center;
        gap: 8px;
        padding: 12px 25px;
        background: #2c3e50;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: background 0.3s ease;
        }

        .botonEnviar:hover {
            background: #34495e;
        }
    </style>
</head>
<body>
    <div class="contenedor">
        <p><?php echo htmlspecialchars($mensaje); ?></p>
        <button class="botonEnviar" onclick="history.back()">Regresar</button>
    </div>
</body>
</html>