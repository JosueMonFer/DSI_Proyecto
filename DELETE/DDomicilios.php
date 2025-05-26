<?php
    //Recuperar datos
    $IdDomicilio=$_REQUEST['IdDomicilio'];

    //Pasar a formar instrucciones SQL
    $SQL="DELETE FROM Domicilios WHERE IdDomicilio='$IdDomicilio'";

    //Enviar instrucciones SQL
    include("../controlador.php");
    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    $FilasAfectadas = mysqli_affected_rows($Conexion);

    //Interpretar resultados
    if($FilasAfectadas==0){
        print("0 Registros afectados");
    }
    else{
        print("1 Registro afectado");
    }

    Desconectar($Conexion);
?>