<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Centros Verificacion</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdCenVerificacion'])) {
            echo "Falta el IdCenVerificacion";
            exit;
        }

        $IdCenVerificacion = $_GET['IdCenVerificacion'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM CentrosVerificacion WHERE IdCenVerificacion = '$IdCenVerificacion'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>
    <form method="get" action="UCentrosVerificacion.php">
        <label>Editar Centros de Verificacion</label>
        <br>
        <label>IdCenVerificacion</label>
        <br>
        <input type="number" name="IdCenVerificacion" id="IdCenVerificacion" value="<?php echo $Row['IdCenVerificacion']; ?>" readonly>
        <br>
        <label>NoLinea</label>
        <br>
        <input type="text" name="NoLinea" id="NoLinea" value="<?php echo $Row['NoLinea']; ?>">
        <br>
        <label>Verificacion</label>
        <br>
        <input type="text" name="Verificacion" id="Verificacion" value="<?php echo $Row['Verificacion']; ?>">
        <br>
        <label>IdDomicilio</label>
        <br>
        <input type="number" name="IdDomicilio" id="IdDomicilio" value="<?php echo $Row['IdDomicilio']; ?>">
        <br>
        <input type="submit">
        <br>
    </form>
</body>

</html>

//HOLA//