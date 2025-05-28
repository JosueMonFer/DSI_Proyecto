<?php
$IdPago = $_POST['IdPago'];
$Nombre = $_POST['Nombre'];
$Apellido = $_POST['Apellido'];
$FechaNacimiento = $_POST['FechaNacimiento'];
$FechaExpedicion = $_POST['FechaExpedicion'];
$FechaValidacion = $_POST['FechaValidacion'];
$Monto = $_POST['Monto'];
$Firma = $_POST['Firma'];
$FolioTarjetaCirculacion = $_POST['FolioTarjetaCirculacion'];

$SQL = "INSERT INTO Pagos (IdPago, Nombre, Apellido, FechaNacimiento, FechaExpedicion, FechaValidacion, Monto, Firma, FolioTarjetaCirculacion) VALUES ('$IdPago', '$Nombre', '$Apellido', '$FechaNacimiento', '$FechaExpedicion', '$FechaValidacion', '$Monto', '$Firma', '$FolioTarjetaCirculacion')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoPago/>');
    
    $xml->addChild('IdPago', $IdPago);
    $xml->addChild('Nombre', htmlspecialchars($Nombre));
    $xml->addChild('Apellido', htmlspecialchars($Apellido));
    $xml->addChild('FechaNacimiento', $FechaNacimiento);
    $xml->addChild('FechaExpedicion', $FechaExpedicion);
    $xml->addChild('FechaValidacion', $FechaValidacion);
    $xml->addChild('Monto', $Monto);
    $xml->addChild('Firma', htmlspecialchars($Firma));
    $xml->addChild('FolioTarjetaCirculacion', $FolioTarjetaCirculacion);

    $nombreArchivo = '../RESPALDOS/Pagos/IdPago_'. $IdPago. '.xml';
    $xml->asXML($nombreArchivo);
    
    $mensaje ="Inserción exitosa. Respaldo XML creado en: ". $nombreArchivo;
}
else{
    $mensaje ="Inserción fallida: ". $Conexion->error;
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