<?php

if (
    isset($_GET['FolioVerificacion']) &&
    isset($_GET['IdVehiculo']) &&
    isset($_GET['Entidad']) &&
    isset($_GET['Municipio']) &&
    isset($_GET['IdCenVerificacion']) &&
    isset($_GET['NoLineaVerificacion']) &&
    isset($_GET['TecnicoVerificador']) &&
    isset($_GET['FechaExpedicion']) &&
    isset($_GET['HoraEntrada']) &&
    isset($_GET['HoraSalida']) &&
    isset($_GET['MotivoVerificacion']) &&
    isset($_GET['Semestre']) &&
    isset($_GET['Vigencia']) &&
    isset($_GET['CodigoBarra']) &&
    isset($_GET['CodigoQR'])
) {

    $FolioVerificacion = $_GET['FolioVerificacion'];
    $IdVehiculo = $_GET['IdVehiculo'];
    $Entidad = $_GET['Entidad'];
    $Municipio = $_GET['Municipio'];
    $IdCenVerificacion = $_GET['IdCenVerificacion'];
    $NoLineaVerificacion = $_GET['NoLineaVerificacion'];
    $TecnicoVerificador = $_GET['TecnicoVerificador'];
    $FechaExpedicion = $_GET['FechaExpedicion'];
    $HoraEntrada = $_GET['HoraEntrada'];
    $HoraSalida = $_GET['HoraSalida'];
    $MotivoVerificacion = $_GET['MotivoVerificacion'];
    $Semestre = $_GET['Semestre'];
    $Vigencia = $_GET['Vigencia'];
    $CodigoBarra = $_GET['CodigoBarra'];
    $CodigoQR = $_GET['CodigoQR'];

    $SQL = "UPDATE TarjetasDeVerificacion SET 
            IdVehiculo = '$IdVehiculo',
            Entidad = '$Entidad',
            Municipio = '$Municipio',
            IdCenVerificacion = '$IdCenVerificacion',
            NoLineaVerificacion = '$NoLineaVerificacion',
            TecnicoVerificador = '$TecnicoVerificador',
            FechaExpedicion = '$FechaExpedicion',
            HoraEntrada = '$HoraEntrada',
            HoraSalida = '$HoraSalida',
            MotivoVerificacion = '$MotivoVerificacion',
            Semestre = '$Semestre',
            Vigencia = '$Vigencia',
            CodigoBarra = '$CodigoBarra',
            CodigoQR = '$CodigoQR'
            WHERE FolioVerificacion = '$FolioVerificacion'";

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