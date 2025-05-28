<?php

if (
    isset($_GET['IdMulta']) &&
    isset($_GET['Dia']) &&
    isset($_GET['Mes']) &&
    isset($_GET['Anio']) &&
    isset($_GET['Hora']) &&
    isset($_GET['FolioTarjetaCirculacion']) &&
    isset($_GET['IdOficial']) &&
    isset($_GET['FolioVerificacion']) &&
    isset($_GET['NoLicencia'])
) {

    $IdMulta = $_GET['IdMulta'];
    $Dia = $_GET['Dia'];
    $Mes = $_GET['Mes'];
    $Anio = $_GET['Anio'];
    $Hora = $_GET['Hora'];
    $FolioTarjetaCirculacion = $_GET['FolioTarjetaCirculacion'];
    $IdOficial = $_GET['IdOficial'];
    $FolioVerificacion = $_GET['FolioVerificacion'];
    $NoLicencia = $_GET['NoLicencia'];

    $SQL = "UPDATE Multas SET 
            Dia = '$Dia', 
            Mes = '$Mes', 
            Anio = '$Anio', 
            Hora = '$Hora', 
            FolioTarjetaCirculacion = '$FolioTarjetaCirculacion', 
            IdOficial = '$IdOficial', 
            FolioVerificacion = '$FolioVerificacion', 
            NoLicencia = '$NoLicencia'
            WHERE IdMulta = '$IdMulta'";

    include("../controlador.php");

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    $NumRows = mysqli_affected_rows($Conexion);
    Desconectar($Conexion);

    if ($NumRows == 1) {
        $mensaje = "1 Registro actualizado";
    } else {
        $mensaje = "0 Registros actualizados: " . (isset($Conexion->error) ? $Conexion->error : "Error desconocido");
    }

} else {
    $mensaje = "Error: Faltan parámetros requeridos";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de actualización</title>
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
            font-family: Arial, sans-serif;
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn-regresar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-regresar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
        <button class="btn-regresar" onclick="window.history.back();">Regresar</button>
    </div>
</body>
</html>