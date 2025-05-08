<?php
    //Recuperar datos
    $NoLicencia=$_REQUEST['NoLicencia'];

    //Pasar a formar instrucciones SQL
    $SQL="DELETE FROM Licencias WHERE NoLicencia='$NoLicencia'";

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