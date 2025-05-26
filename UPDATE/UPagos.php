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
        echo "1 Registro actualizado";
    } else {
        echo "0 Registros actualizados";
    }

}
?>