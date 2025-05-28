<?php
$IdMulta = $_REQUEST['IdMulta'];
$Dia = $_REQUEST['Dia'];
$Mes = $_REQUEST['Mes'];
$Anio = $_REQUEST['Anio'];
$Hora = $_REQUEST['Hora'];
$FolioTarjetaCirculacion = $_REQUEST['FolioTarjetaCirculacion'];
$IdOficial = $_REQUEST['IdOficial'];
$FolioVerificacion = $_REQUEST['FolioVerificacion'];
$NoLicencia = $_REQUEST['NoLicencia'];

$SQL = "INSERT INTO Multas VALUES ('$IdMulta', '$Dia', '$Mes', '$Anio', '$Hora', '$FolioTarjetaCirculacion', '$IdOficial', '$FolioVerificacion', '$NoLicencia')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);

if($ResultSet == 1){
    $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><RespaldoMulta/>');
    
    $xml->addChild('IdMulta', $IdMulta);
    $xml->addChild('Dia', $Dia);
    $xml->addChild('Mes', $Mes);
    $xml->addChild('Anio', $Anio);
    $xml->addChild('Hora', htmlspecialchars($Hora));
    $xml->addChild('FolioTarjetaCirculacion', htmlspecialchars($FolioTarjetaCirculacion));
    $xml->addChild('IdOficial', $IdOficial);
    $xml->addChild('FolioVerificacion', htmlspecialchars($FolioVerificacion));
    $xml->addChild('NoLicencia', $NoLicencia);

    $nombreArchivo = '../RESPALDOS/Multas/IdMulta_'. $IdMulta. '.xml';
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