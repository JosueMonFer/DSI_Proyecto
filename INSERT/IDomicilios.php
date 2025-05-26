<?php
    $IdDomicilio=$_GET['IdDomicilio'];
    $Calle=$_GET['Calle'];
    $Colonia=$_GET['Colonia'];
    $NoExterior=$_GET['NoExterior'];
    $Cp=$_GET['Cp'];
    $Municipio=$_GET['Municipio'];
    $Estado=$_GET['Estado'];

    $SQL="INSERT INTO Domicilios VALUES ('$IdDomicilio', '$Calle', '$Colonia', '$NoExterior', '$Cp', '$Municipio', '$Estado')";
    
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