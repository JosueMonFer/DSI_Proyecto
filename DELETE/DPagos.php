<?php
    //Recuperar datos
    $IdPago=$_REQUEST['IdPago'];

    //Pasar a formar instrucciones SQL
    $SQL="DELETE FROM Pagos WHERE IdPago='$IdPago'";

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

    echo '<br><br><button onclick="window.history.back()">Regresar</button>';
    
    Desconectar($Conexion);
?>