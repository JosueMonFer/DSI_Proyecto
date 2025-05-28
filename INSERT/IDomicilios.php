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
        
        $mensaje ="Inserción exitosa. Respaldo XML creado en: " . $nombreArchivo;
    }
    else{
        $mensaje ="Inserción fallida: " . $Conexion->error;
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