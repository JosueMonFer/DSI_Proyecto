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
        echo "1 Registro actualizado";
    } else {
        echo "0 Registros actualizados";
    }

}
?>