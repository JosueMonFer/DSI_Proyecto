<?php

if (
    isset($_GET['IdOficial']) &&
    isset($_GET['Cargo']) &&
    isset($_GET['Nombre']) &&
    isset($_GET['Apellido'])
) {

    $IdOficial = $_GET['IdOficial'];
    $Cargo = $_GET['Cargo'];
    $Nombre = $_GET['Nombre'];
    $Apellido = $_GET['Apellido'];

    $SQL = "UPDATE Oficiales SET 
            Cargo = '$Cargo', 
            Nombre = '$Nombre', 
            Apellido = '$Apellido'
            WHERE IdOficial = '$IdOficial'";

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
