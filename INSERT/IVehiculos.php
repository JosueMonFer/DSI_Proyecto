<?php
    $IdVehiculo=$_REQUEST['IdVehiculo'];
    $Cilindro=$_REQUEST['Cilindro'];
    $Combustible=$_REQUEST['Combustible'];
    $Llanta=$_REQUEST['Llanta'];
    $Asiento=$_REQUEST['Asiento'];
    $Holograma=$_REQUEST['Holograma'];
    $Color=$_REQUEST['Color'];
    $Puerta=$_REQUEST['Puerta'];
    $Modelo=$_REQUEST['Modelo'];
    $Submarca=$_REQUEST['Submarca'];
    $Placa=$_REQUEST['Placa'];
    $NumeroSerie=$_REQUEST['NumeroSerie'];
    $Clase=$_REQUEST['Clase'];
    $Carroceria=$_REQUEST['Carroceria'];
    $TipoServicio=$_REQUEST['TipoServicio'];
    $NumeroMotor=$_REQUEST['NumeroMotor'];
    $Transmision=$_REQUEST['Transmision'];

    /*
    print("IdVehiculo = ".$IdVehiculo."<br>");
    print("Cilindro = ".$Cilindro."<br>");
    print("Combustible = ".$Combustible."<br>");
    print("Llanta = ".$Llanta."<br>");
    print("Asiento = ".$Asiento."<br>");
    print("Holograma = ".$Holograma."<br>");
    print("Color = ".$Color."<br>");
    print("Puerta = ".$Puerta."<br>");
    print("Modelo = ".$Modelo."<br>");
    print("Submarca = ".$Submarca."<br>");
    print("Placa = ".$Placa."<br>");
    print("NumeroSerie = ".$NumeroSerie."<br>");
    print("Clase = ".$Clase."<br>");
    print("Carroceria = ".$Carroceria."<br>");
    print("TipoServicio = ".$TipoServicio."<br>");
    print("NumeroMotor = ".$NumeroMotor."<br>");
    print("Transmision = ".$Transmision."<br>");
    */

    //Pasar a formar instrucciones SQL

    $SQL="INSERT INTO Vehiculos(IdVehiculo, Cilindro, Combustible, Llanta, Asiento, Holograma, Color, Puerta, Modelo, Submarca, Placa, NumeroSerie, Clase, Carroceria, TipoServicio, NumeroMotor, Transmision) VALUES ('$IdVehiculo', '$Cilindro', '$Combustible', '$Llanta', '$Asiento', '$Holograma', '$Color', '$Puerta', '$Modelo', '$Submarca', '$Placa', '$NumeroSerie', '$Clase', '$Carroceria', '$TipoServicio', '$NumeroMotor', '$Transmision')";
    
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