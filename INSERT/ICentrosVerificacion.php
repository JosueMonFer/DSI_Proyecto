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
        
        $mensaje = "Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo;
    } else {
        $mensaje = "Inserción fallida: ". $Conexion->error;
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