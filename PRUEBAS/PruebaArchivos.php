<?php
    //Abrir archivo
    $NombreArchivo = "archivo.txt";
    $Manejador = fopen($NombreArchivo, "r");

    //Leer o escribir archivo
    fwrite($Manejador, "Hola Mundo");

    //Cerrar archivo
    fclose($Manejador);
?>