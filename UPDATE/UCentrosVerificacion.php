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
        echo "1 Registro actualizado";
    } else {
        echo "0 Registros actualizados";
    }

}
?>
