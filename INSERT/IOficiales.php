<?php
    $IdOficial=$_REQUEST['IdOficial'];
    $Cargo=$_REQUEST['Cargo'];
    $Nombre=$_REQUEST['Nombre'];
    $Apellido=$_REQUEST['Apellido'];

    /*
    print("IdOficial = ".$IdOficial."<br>");
    print("Cargo = ".$Cargo."<br>");
    print("Nombre = ".$Nombre."<br>");
    print("Apellido = ".$Apellido."<br>");
    */
    
    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO Oficiales VALUES ('$IdOficial', '$Cargo', '$Nombre', '$Apellido')";

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