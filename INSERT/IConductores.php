<?php
    $IdConductor=$_POST['IdConductor'];
    $Curp=$_POST['Curp'];
    $Nombre=$_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $IdDomicilio=$_POST['IdDomicilio'];
    $Folio=$_POST['Folio'];
    $NoEmergencia=$_POST['NoEmergencia'];
    
    $SQL="INSERT INTO Conductores VALUES ('$IdConductor', '$Curp', '$Nombre', '$Apellido', '$IdDomicilio', '$Folio', '$NoEmergencia')";
    
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