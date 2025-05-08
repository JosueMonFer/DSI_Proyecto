<?php
    $NoLicencia=$_REQUEST['NoLicencia'];
    $Nombre=$_REQUEST['Nombre'];
    $Foto=$_REQUEST['Foto'];
    $Observacion = $_REQUEST['Observacion'];
    $FechaNac = $_REQUEST['FechaNac'];
    $FechaExped = $_REQUEST['FechaExped'];
    $FechaValid = $_REQUEST['FechaValid'];
    $Antiguedad = $_REQUEST['Antiguedad'];
    $Firma = $_REQUEST['Firma'];
    $IdDomicilio = $_REQUEST['IdDomicilio'];
    $Restriccion = $_REQUEST['Restriccion'];
    $GrupoSanguineo = $_REQUEST['GrupoSanguineo'];
    $DonadorOrgano = $_REQUEST['DonadorOrgano'];
    $NoEmergencia = $_REQUEST['NoEmergencia'];
    $IdConductor = $_REQUEST['IdConductor'];

    /*
    print("NoLicencia = ".$NoLicencia."<br>");
    print("Nombre = ".$Nombre."<br>");
    print("Foto = ".$Foto."<br>");
    print("Observacion = ".$Observacion."<br>");
    print("FechaNac = ".$FechaNac."<br>");
    print("FechaExped = ".$FechaExped."<br>");
    print("FechaValid = ".$FechaValid."<br>");
    print("Antiguedad = ".$Antiguedad."<br>");
    print("Firma = ".$Firma."<br>");
    print("IdDomicilio = ".$IdDomicilio."<br>");
    print("Restriccion = ".$Restriccion."<br>");
    print("GrupoSanguineo = ".$GrupoSanguineo."<br>");
    print("DonadorOrgano = ".$DonadorOrgano."<br>");
    print("NoEmergencia = ".$NoEmergencia."<br>");
    print("IdConductor = ".$IdConductor."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO Licencias VALUES ('$NoLicencia', '$Nombre', '$Foto', '$Observacion', '$FechaNac', '$FechaExped', '$FechaValid', '$Antiguedad', '$Firma', '$IdDomicilio', '$Restriccion', '$GrupoSanguineo', '$DonadorOrgano', '$NoEmergencia', '$IdConductor')";
    
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