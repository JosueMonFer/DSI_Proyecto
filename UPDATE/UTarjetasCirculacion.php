<?php

if (
    isset($_GET['FolioTarjetaCirculacion']) &&
    isset($_GET['Holograma']) &&
    isset($_GET['Vigencia']) &&
    isset($_GET['Rfc']) &&
    isset($_GET['Localidad']) &&
    isset($_GET['Municipio']) &&
    isset($_GET['FechaExpedicion']) &&
    isset($_GET['CveVehicular']) &&
    isset($_GET['IdVehiculo']) &&
    isset($_GET['IdPropietario'])
) {

    $FolioTarjetaCirculacion = $_GET['FolioTarjetaCirculacion'];
    $Holograma = $_GET['Holograma'];
    $Vigencia = $_GET['Vigencia'];
    $Rfc = $_GET['Rfc'];
    $Localidad = $_GET['Localidad'];
    $Municipio = $_GET['Municipio'];
    $FechaExpedicion = $_GET['FechaExpedicion'];
    $CveVehicular = $_GET['CveVehicular'];
    $IdVehiculo = $_GET['IdVehiculo'];
    $IdPropietario = $_GET['IdPropietario'];

    $SQL = "UPDATE TarjetasCirculacion SET 
            Holograma = '$Holograma',
            Vigencia = '$Vigencia',
            Rfc = '$Rfc',
            Localidad = '$Localidad',
            Municipio = '$Municipio',
            FechaExpedicion = '$FechaExpedicion',
            CveVehicular = '$CveVehicular',
            IdVehiculo = '$IdVehiculo',
            IdPropietario = '$IdPropietario'
            WHERE FolioTarjetaCirculacion = '$FolioTarjetaCirculacion'";

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