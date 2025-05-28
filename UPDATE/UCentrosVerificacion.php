<?php

if (
    isset($_GET['IdCenVerificacion']) &&
    isset($_GET['NoLinea']) &&
    isset($_GET['Verificacion']) &&
    isset($_GET['IdDomicilio'])
) {

    $IdCenVerificacion = $_GET['IdCenVerificacion'];
    $NoLinea = $_GET['NoLinea'];
    $Verificacion = $_GET['Verificacion'];
    $IdDomicilio = $_GET['IdDomicilio'];

    $SQL = "UPDATE CentrosVerificacion SET 
            NoLinea = '$NoLinea', 
            Verificacion = '$Verificacion', 
            IdDomicilio = '$IdDomicilio'
            WHERE IdCenVerificacion = '$IdCenVerificacion'";

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