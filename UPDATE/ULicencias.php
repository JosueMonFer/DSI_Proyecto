<?php

if (
    isset($_GET['NoLicencia']) &&
    isset($_GET['Nombre']) &&
    isset($_GET['Foto']) &&
    isset($_GET['Observacion']) &&
    isset($_GET['FechaNac']) &&
    isset($_GET['FechaExped']) &&
    isset($_GET['FechaValid']) &&
    isset($_GET['Antiguedad']) &&
    isset($_GET['Firma']) &&
    isset($_GET['IdDomicilio']) &&
    isset($_GET['Restriccion']) &&
    isset($_GET['GrupoSanguineo']) &&
    isset($_GET['DonadorOrgano']) &&
    isset($_GET['NoEmergencia']) &&
    isset($_GET['IdConductor'])
) {

    $NoLicencia = $_GET['NoLicencia'];
    $Nombre = $_GET['Nombre'];
    $Foto = $_GET['Foto'];
    $Observacion = $_GET['Observacion'];
    $FechaNac = $_GET['FechaNac'];
    $FechaExped = $_GET['FechaExped'];
    $FechaValid = $_GET['FechaValid'];
    $Antiguedad = $_GET['Antiguedad'];
    $Firma = $_GET['Firma'];
    $IdDomicilio = $_GET['IdDomicilio'];
    $Restriccion = $_GET['Restriccion'];
    $GrupoSanguineo = $_GET['GrupoSanguineo'];
    $DonadorOrgano = $_GET['DonadorOrgano'];
    $NoEmergencia = $_GET['NoEmergencia'];
    $IdConductor = $_GET['IdConductor'];

    $SQL = "UPDATE Licencias SET 
            Nombre = '$Nombre', 
            Foto = '$Foto', 
            Observacion = '$Observacion', 
            FechaNac = '$FechaNac', 
            FechaExped = '$FechaExped', 
            FechaValid = '$FechaValid', 
            Antiguedad = '$Antiguedad', 
            Firma = '$Firma', 
            IdDomicilio = '$IdDomicilio', 
            Restriccion = '$Restriccion', 
            GrupoSanguineo = '$GrupoSanguineo', 
            DonadorOrgano = '$DonadorOrgano', 
            NoEmergencia = '$NoEmergencia', 
            IdConductor = '$IdConductor'
            WHERE NoLicencia = '$NoLicencia'";

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