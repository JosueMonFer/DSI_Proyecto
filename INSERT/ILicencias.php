<?php
// Configuración de directorios
$fotosDir = 'FILES/Fotos/';
$firmasDir = 'FILES/Firmas/';
$maxFileSize = 10 * 1024 * 1024;

// Crear directorios si no existen
if (!file_exists($fotosDir)) {
    mkdir($fotosDir, 0777, true);
}
if (!file_exists($firmasDir)) {
    mkdir($firmasDir, 0777, true);
}

// Procesar la foto
$fotoNombre = '';
if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] == UPLOAD_ERR_OK) {
    $fotoTmp = $_FILES['Foto']['tmp_name'];
    $fotoNombre = basename($_FILES['Foto']['name']);
    $fotoDestino = $fotosDir . $fotoNombre;
    
    // Mover el archivo a la carpeta de fotos
    if (!move_uploaded_file($fotoTmp, $fotoDestino)) {
        die("Error al subir la foto");
    }
}

// Procesar la firma
$firmaNombre = '';
if (isset($_FILES['Firma']) && $_FILES['Firma']['error'] == UPLOAD_ERR_OK) {
    $firmaTmp = $_FILES['Firma']['tmp_name'];
    $firmaNombre = basename($_FILES['Firma']['name']);
    $firmaDestino = $firmasDir . $firmaNombre;
    
    // Mover el archivo a la carpeta de firmas
    if (!move_uploaded_file($firmaTmp, $firmaDestino)) {
        die("Error al subir la firma");
    }
}

// Obtener los demás datos del formulario
$NoLicencia = $_POST['NoLicencia'];
$Nombre = $_POST['Nombre'];
$Observacion = $_POST['Observacion'];
$FechaNac = $_POST['FechaNac'];
$FechaExped = $_POST['FechaExped'];
$FechaValid = $_POST['FechaValid'];
$Antiguedad = $_POST['Antiguedad'];
$IdDomicilio = $_POST['IdDomicilio'];
$Restriccion = $_POST['Restriccion'];
$GrupoSanguineo = $_POST['GrupoSanguineo'];
$DonadorOrgano = $_POST['DonadorOrgano'];
$NoEmergencia = $_POST['NoEmergencia'];
$IdConductor = $_POST['IdConductor'];

// Preparar la consulta SQL
$SQL = "INSERT INTO Licencias VALUES ('$NoLicencia', '$Nombre', '$fotoNombre', '$Observacion', '$FechaNac', '$FechaExped', '$FechaValid', '$Antiguedad', '$firmaNombre', '$IdDomicilio', '$Restriccion', '$GrupoSanguineo', '$DonadorOrgano', '$NoEmergencia', '$IdConductor')";

include("../controlador.php"); 

$Conexion = Conectar();
$ResultSet = Ejecutar($Conexion, $SQL);
Desconectar($Conexion);

if($ResultSet==1){
    print("Inserción exitosa");
}
else{
    print("Inserción fallida".$Conexion->error);
}
?>