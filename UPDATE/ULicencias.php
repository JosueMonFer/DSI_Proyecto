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
        echo "1 Registro actualizado";
    } else {
        echo "0 Registros actualizados";
    }

}
?>