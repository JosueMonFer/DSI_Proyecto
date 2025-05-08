<?php
    if (isset($_GET['IdPropietario']) && isset($_GET['Nombre']) && isset($_GET['Apellido']) && isset($_GET['AnioNacimiento']) && isset($_GET['IdVehiculo'])) {
    $IdPropietario=$_GET['IdPropietario'];
    $Nombre=$_GET['Nombre'];
    $Apellido=$_GET['Apellido'];
    $AnioNacimiento=$_GET['AnioNacimiento'];
    $IdVehiculo=$_GET['IdVehiculo'];

    //Pasar a formar instrucciones SQL
    $SQL="UPDATE Propietarios SET Nombre='$Nombre', Apellido='$Apellido', AnioNacimiento='$AnioNacimiento', IdVehiculo='$IdVehiculo' WHERE IdPropietario='$IdPropietario'";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);
    
    $NumRows = mysqli_affected_rows($Conexion);
    Desconectar($Conexion);

    if($NumRows == 1){
        print("1 Registro actualizado");
    }
    else{
        print("0 Registros actualizados");
    }
}
?>