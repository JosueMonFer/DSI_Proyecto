<?php
    $IdPropietario=$_GET['IdPropietario'];
    $Nombre=$_GET['Nombre'];
    $Apellido=$_GET['Apellido'];
    $AnioNacimiento=$_GET['AnioNacimiento'];
    $IdVehiculo=$_GET['IdVehiculo'];

    /*
    print("IdPropietario = ".$IdPropietario."<br>");
    print("Nombre = ".$Nombre."<br>");
    print("Apellido = ".$Apellido."<br>");
    print("AnioNacimiento = ".$AnioNacimiento."<br>");
    print("FolioTarjetaCirculacion = ".$FolioTarjetaCirculacion."<br>");
    print("IdVehiculo = ".$IdVehiculo."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO Propietarios (IdPropietario, Nombre, Apellido, AnioNacimiento, IdVehiculo) VALUES ('$IdPropietario', '$Nombre', '$Apellido', '$AnioNacimiento', '$IdVehiculo')";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);
    Desconectar($Conexion);
    
    if($ResultSet==1){
        print("Incercion exitosa");
    }
    else{
        print("Insercion fallida".$Conexion->error);
    }
?>