<?php

if (
    isset($_GET['IdVehiculo']) &&
    isset($_GET['Cilindro']) &&
    isset($_GET['Combustible']) &&
    isset($_GET['Llanta']) &&
    isset($_GET['Asiento']) &&
    isset($_GET['Holograma']) &&
    isset($_GET['Color']) &&
    isset($_GET['Puerta']) &&
    isset($_GET['Modelo']) &&
    isset($_GET['Submarca']) &&
    isset($_GET['Placa']) &&
    isset($_GET['NumeroSerie']) &&
    isset($_GET['Clase']) &&
    isset($_GET['Carroceria']) &&
    isset($_GET['TipoServicio']) &&
    isset($_GET['NumeroMotor']) &&
    isset($_GET['Transmision'])
) {

    $IdVehiculo = $_GET['IdVehiculo'];
    $Cilindro = $_GET['Cilindro'];
    $Combustible = $_GET['Combustible'];
    $Llanta = $_GET['Llanta'];
    $Asiento = $_GET['Asiento'];
    $Holograma = $_GET['Holograma'];
    $Color = $_GET['Color'];
    $Puerta = $_GET['Puerta'];
    $Modelo = $_GET['Modelo'];
    $Submarca = $_GET['Submarca'];
    $Placa = $_GET['Placa'];
    $NumeroSerie = $_GET['NumeroSerie'];
    $Clase = $_GET['Clase'];
    $Carroceria = $_GET['Carroceria'];
    $TipoServicio = $_GET['TipoServicio'];
    $NumeroMotor = $_GET['NumeroMotor'];
    $Transmision = $_GET['Transmision'];

    $SQL = "UPDATE Vehiculos SET
            Cilindro = '$Cilindro',
            Combustible = '$Combustible',
            Llanta = '$Llanta',
            Asiento = '$Asiento',
            Holograma = '$Holograma',
            Color = '$Color',
            Puerta = '$Puerta',
            Modelo = '$Modelo',
            Submarca = '$Submarca',
            Placa = '$Placa',
            NumeroSerie = '$NumeroSerie',
            Clase = '$Clase',
            Carroceria = '$Carroceria',
            TipoServicio = '$TipoServicio',
            NumeroMotor = '$NumeroMotor',
            Transmision = '$Transmision'
            WHERE IdVehiculo = '$IdVehiculo'";

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
