<?php
    $IdPago = $_POST['IdPago'];
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $FechaNacimiento = $_POST['FechaNacimiento'];
    $FechaExpedicion = $_POST['FechaExpedicion'];
    $FechaValidacion = $_POST['FechaValidacion'];
    $Monto = $_POST['Monto'];
    $Firma = $_POST['Firma'];
    $FolioTarjetaCirculacion = $_POST['FolioTarjetaCirculacion'];

    /*
    print("IdPago = ".$IdPago."<br>");
    print("Nombre = ".$Nombre."<br>");
    print("Apellido = ".$Apellido."<br>");
    print("FechaNacimiento = ".$FechaNacimiento."<br>");
    print("FechaExpedicion = ".$FechaExpedicion."<br>");
    print("FechaValidacion = ".$FechaValidacion."<br>");
    print("Monto = ".$Monto."<br>");
    print("Firma = ".$Firma."<br>");
    print("FolioTarjetaCirculacion = ".$FolioTarjetaCirculacion."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO Pagos (IdPago, Nombre, Apellido, FechaNacimiento, FechaExpedicion, FechaValidacion, Monto, Firma, FolioTarjetaCirculacion) VALUES ('$IdPago', '$Nombre', '$Apellido', '$FechaNacimiento', '$FechaExpedicion', '$FechaValidacion', '$Monto', '$Firma', '$FolioTarjetaCirculacion')";
    
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