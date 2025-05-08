<?php
    $IdMulta=$_REQUEST['IdMulta'];
    $Dia = $_REQUEST['Dia'];
    $Mes = $_REQUEST['Mes'];
    $Anio = $_REQUEST['Anio'];
    $Hora = $_REQUEST['Hora'];
    $FolioTarjetaCirculacion = $_REQUEST['FolioTarjetaCirculacion'];
    $IdOficial = $_REQUEST['IdOficial'];
    $FolioVerificacion = $_REQUEST['FolioVerificacion'];
    $NoLicencia = $_REQUEST['NoLicencia'];

    /*
    print("IdMulta = ".$IdMulta."<br>");
    print("Dia = ".$Dia."<br>");
    print("Mes = ".$Mes."<br>");
    print("Anio = ".$Anio."<br>");
    print("Hora = ".$Hora."<br>");
    print("FolioTarjetaCirculacion = ".$FolioTarjetaCirculacion."<br>");
    print("IdOficial = ".$IdOficial."<br>");
    print("FolioVerificacion = ".$FolioVerificacion."<br>");
    print("NoLicencia = ".$NoLicencia."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO Multas VALUES ('$IdMulta', '$Dia', '$Mes', '$Anio', '$Hora', '$FolioTarjetaCirculacion', '$IdOficial', '$FolioVerificacion', '$NoLicencia')";
    
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