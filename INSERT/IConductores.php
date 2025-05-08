<?php
    $IdConductor=$_POST['IdConductor'];
    $Curp=$_POST['Curp'];
    $Nombre=$_POST['Nombre'];
    $Apellido=$_POST['Apellido'];
    $IdDomicilio=$_POST['IdDomicilio'];
    $Folio=$_POST['Folio'];
    $NoEmergencia=$_POST['NoEmergencia'];

    /*
    print("IdConductor = ".$IdConductor."<br>");
    print("Curp = ".$Curp."<br>");
    print("Nombre = ".$Nombre."<br>");
    print("Apellido = ".$Apellido."<br>");
    print("IdDomicilio = ".$IdDomicilio."<br>");
    print("Folio = ".$Folio."<br>");
    print("NoEmergencia = ".$NoEmergencia."<br>");
    */
    
    //Pasar a formar instrucciones SQL

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