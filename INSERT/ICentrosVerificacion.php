<?php
    $IdCenVerificacion = $_POST['IdCenVerificacion'];
    $NoLinea = $_POST['NoLinea'];
    $Verificacion = $_POST['Verificacion'];
    $IdDomicilio = $_POST['IdDomicilio'];

    // 1. Primero creamos el respaldo en XML
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;
    
    $root = $xml->createElement('CentrosVerificacion');
    $xml->appendChild($root);
    
    $centro = $xml->createElement('Centro');
    $root->appendChild($centro);
    
    $centro->appendChild($xml->createElement('IdCenVerificacion', $IdCenVerificacion));
    $centro->appendChild($xml->createElement('NoLinea', $NoLinea));
    $centro->appendChild($xml->createElement('Verificacion', $Verificacion));
    $centro->appendChild($xml->createElement('IdDomicilio', $IdDomicilio));
    
    // Nombre del archivo con timestamp para evitar sobreescrituras
    $filename = 'backups/centro_' . $IdCenVerificacion . '_' . date('Ymd_His') . '.xml';
    
    // Crear directorio backups si no existe
    if (!file_exists('backups')) {
        mkdir('backups', 0777, true);
    }
    
    $xml->save($filename);

    // 2. Luego insertamos en la base de datos
    $SQL = "INSERT INTO CentrosVerificacion VALUES ('$IdCenVerificacion', '$NoLinea', '$Verificacion', '$IdDomicilio')";

    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);
    Desconectar($Conexion);

    if($ResultSet == 1) {
        print("Inserción exitosa. Respaldo XML creado: " . $filename);
    } else {
        print("Inserción fallida: " . $Conexion->error);
    }
?>