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
        echo "1 Registro actualizado";
    } else {
        echo "0 Registros actualizados";
    }

} else {
    echo "Faltan datos en el formulario";
}
?>
