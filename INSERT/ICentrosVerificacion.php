<?php
    $IdCenVerificacion=$_POST['IdCenVerificacion'];
    $NoLinea=$_POST['NoLinea'];
    $Verificacion=$_POST['Verificacion'];
    $IdDomicilio=$_POST['IdDomicilio'];

    /*
    print("IdCenVerificacion = ".$IdCenVerificacion."<br>");
    print("NoLinea = ".$NoLinea."<br>");
    print("Verificacion = ".$Verificacion."<br>");
    print("IdDomicilio = ".$IdDomicilio."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO CentrosVerificacion VALUES ('$IdCenVerificacion', '$NoLinea', '$Verificacion', '$IdDomicilio')";

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