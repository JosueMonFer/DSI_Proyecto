<?php

if (
    isset($_GET['IdPago']) &&
    isset($_GET['Nombre']) &&
    isset($_GET['Apellido']) &&
    isset($_GET['FechaNacimiento']) &&
    isset($_GET['FechaExpedicion']) &&
    isset($_GET['FechaValidacion']) &&
    isset($_GET['Monto']) &&
    isset($_GET['Firma']) &&
    isset($_GET['FolioTarjetaCirculacion'])
) {

    $IdPago = $_GET['IdPago'];
    $Nombre = $_GET['Nombre'];
    $Apellido = $_GET['Apellido'];
    $FechaNacimiento = $_GET['FechaNacimiento'];
    $FechaExpedicion = $_GET['FechaExpedicion'];
    $FechaValidacion = $_GET['FechaValidacion'];
    $Monto = $_GET['Monto'];
    $Firma = $_GET['Firma'];
    $FolioTarjetaCirculacion = $_GET['FolioTarjetaCirculacion'];

    $SQL = "UPDATE Pagos SET 
            Nombre = '$Nombre',
            Apellido = '$Apellido',
            FechaNacimiento = '$FechaNacimiento',
            FechaExpedicion = '$FechaExpedicion',
            FechaValidacion = '$FechaValidacion',
            Monto = '$Monto',
            Firma = '$Firma',
            FolioTarjetaCirculacion = '$FolioTarjetaCirculacion'
            WHERE IdPago = '$IdPago'";

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