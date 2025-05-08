<?php
    $FolioTarjetaCirculacion=$_REQUEST['FolioTarjetaCirculacion'];
    $Holograma=$_REQUEST['Holograma'];
    $Vigencia=$_REQUEST['Vigencia'];
    $Rfc=$_REQUEST['Rfc'];
    $Localidad=$_REQUEST['Localidad'];
    $Municipio=$_REQUEST['Municipio'];
    $FechaExpedicion=$_REQUEST['FechaExpedicion'];
    $CveVehicular=$_REQUEST['CveVehicular'];
    $IdVehiculo=$_REQUEST['IdVehiculo'];
    $IdPropietario=$_REQUEST['IdPropietario'];

    /*
    print("FolioTarjetaCirculacion = ".$FolioTarjetaCirculacion."<br>");
    print("Holograma = ".$Holograma."<br>");
    print("Vigencia = ".$Vigencia."<br>");
    print("Rfc = ".$Rfc."<br>");
    print("Localidad = ".$Localidad."<br>");
    print("Municipio = ".$Municipio."<br>");
    print("FechaExpedicion = ".$FechaExpedicion."<br>");
    print("CveVehicular = ".$CveVehicular."<br>");
    print("IdVehiculo = ".$IdVehiculo."<br>");
    print("IdPropietario = ".$IdPropietario."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO TarjetasCirculacion(FolioTarjetaCirculacion, Holograma, Vigencia, Rfc, Localidad, Municipio, FechaExpedicion, CveVehicular, IdVehiculo, IdPropietario) VALUES ('$FolioTarjetaCirculacion', '$Holograma', '$Vigencia', '$Rfc', '$Localidad', '$Municipio', '$FechaExpedicion', '$CveVehicular', '$IdVehiculo', '$IdPropietario')";
    
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