<?php

if (
    isset($_GET['IdConductor']) &&
    isset($_GET['Curp']) &&
    isset($_GET['Nombre']) &&
    isset($_GET['Apellido']) &&
    isset($_GET['IdDomicilio']) &&
    isset($_GET['Folio']) &&
    isset($_GET['NoEmergencia'])
) {

    $IdConductor = $_GET['IdConductor'];
    $Curp = $_GET['Curp'];
    $Nombre = $_GET['Nombre'];
    $Apellido = $_GET['Apellido'];
    $IdDomicilio = $_GET['IdDomicilio'];
    $Folio = $_GET['Folio'];
    $NoEmergencia = $_GET['NoEmergencia'];

    $SQL = "UPDATE Conductores SET 
            Curp = '$Curp', 
            Nombre = '$Nombre', 
            Apellido = '$Apellido', 
            IdDomicilio = '$IdDomicilio', 
            Folio = '$Folio', 
            NoEmergencia = '$NoEmergencia'
            WHERE IdConductor = '$IdConductor'";

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