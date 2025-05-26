<?php
    function Conectar(){
        $Servidor = "localhost";
        $Usuario = "root";
        $Pswrd = "";
        $BD = "controlvehicular31";
        $Conexion = mysqli_connect($Servidor, $Usuario, $Pswrd, $BD);
        return $Conexion;
    }

    function Ejecutar($Conexion, $SQL){
        $ResultSet = mysqli_query($Conexion, $SQL) or die(mysqli_error($Conexion));
        return $ResultSet;
    }

    function Procesar(){
        
    }

    function Desconectar($Conexion){
        $Cerrar = mysqli_close($Conexion);
        return $Cerrar;
    }
?>