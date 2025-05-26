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
        echo "1 Registro actualizado";
    } else {
        echo "0 Registros actualizados";
    }

}
?>