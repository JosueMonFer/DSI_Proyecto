<?php
    $FolioVerificacion=$_GET['FolioVerificacion'];
    $IdVehiculo=$_GET['IdVehiculo'];
    $Entidad=$_GET['Entidad'];
    $Municipio=$_GET['Municipio'];
    $IdCenVerificacion=$_GET['IdCenVerificacion'];
    $NoLineaVerificacion=$_GET['NoLineaVerificacion'];
    $TecnicoVerificador=$_GET['TecnicoVerificador'];
    $FechaExpedicion=$_GET['FechaExpedicion'];
    $HoraEntrada=$_GET['HoraEntrada'];
    $HoraSalida=$_GET['HoraSalida'];
    $MotivoVerificacion=$_GET['MotivoVerificacion'];
    $Semestre=$_GET['Semestre'];
    $Vigencia=$_GET['Vigencia'];
    $CodigoBarra=$_GET['CodigoBarra'];
    $CodigoQR=$_GET['CodigoQR'];

    /*
    print("FolioVerificacion = ".$FolioVerificacion."<br>");
    print("IdVehiculo = ".$IdVehiculo."<br>");
    print("Entidad = ".$Entidad."<br>");
    print("Municipio = ".$Municipio."<br>");
    print("IdCenVerificacion = ".$IdCenVerificacion."<br>");
    print("NoLineaVerificacion = ".$NoLineaVerificacion."<br>");
    print("TecnicoVerificador = ".$TecnicoVerificador."<br>");
    print("FechaExpedicion = ".$FechaExpedicion."<br>");
    print("HoraEntrada = ".$HoraEntrada."<br>");
    print("HoraSalida = ".$HoraSalida."<br>");
    print("MotivoVerificacion = ".$MotivoVerificacion."<br>");
    print("Semestre = ".$Semestre."<br>");
    print("Vigencia = ".$Vigencia."<br>");
    print("CodigoBarra = ".$CodigoBarra."<br>");
    print("CodigoQR = ".$CodigoQR."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO TarjetasdeVerificacion(FolioVerificacion, IdVehiculo, Entidad, Municipio, IdCenVerificacion, NoLineaVerificacion, TecnicoVerificador, FechaExpedicion, HoraEntrada, HoraSalida, MotivoVerificacion, Semestre, Vigencia, CodigoBarra, CodigoQR) VALUES ('$FolioVerificacion', '$IdVehiculo', '$Entidad', '$Municipio', '$IdCenVerificacion', '$NoLineaVerificacion', '$TecnicoVerificador', '$FechaExpedicion', '$HoraEntrada', '$HoraSalida', '$MotivoVerificacion', '$Semestre', '$Vigencia', '$CodigoBarra', '$CodigoQR')";

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