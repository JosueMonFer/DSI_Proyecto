<?php

if (
    isset($_GET['IdDomicilio']) &&
    isset($_GET['Calle']) &&
    isset($_GET['Colonia']) &&
    isset($_GET['NoExterior']) &&
    isset($_GET['Cp']) &&
    isset($_GET['Municipio']) &&
    isset($_GET['Estado'])
) {

    $IdDomicilio = $_GET['IdDomicilio'];
    $Calle = $_GET['Calle'];
    $Colonia = $_GET['Colonia'];
    $NoExterior = $_GET['NoExterior'];
    $Cp = $_GET['Cp'];
    $Municipio = $_GET['Municipio'];
    $Estado = $_GET['Estado'];

    $SQL = "UPDATE Domicilios SET 
            Calle = '$Calle', 
            Colonia = '$Colonia', 
            NoExterior = '$NoExterior', 
            Cp = '$Cp', 
            Municipio = '$Municipio', 
            Estado = '$Estado'
            WHERE IdDomicilio = '$IdDomicilio'";

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