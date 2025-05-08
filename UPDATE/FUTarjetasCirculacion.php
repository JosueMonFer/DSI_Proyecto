<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarjetas de Circulación</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['FolioTarjetaCirculacion'])) {
            echo "Falta el FolioTarjetaCirculacion";
            exit;
        }

        $FolioTarjetaCirculacion = $_GET['FolioTarjetaCirculacion'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM TarjetasCirculacion WHERE FolioTarjetaCirculacion = '$FolioTarjetaCirculacion'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UTarjetasCirculacion.php">
        <label><strong>Editar Tarjetas de Circulación</strong></label>
        <br><br>

        <label>FolioTarjetaCirculacion</label>
        <br>
        <input type="number" name="FolioTarjetaCirculacion" id="FolioTarjetaCirculacion" value="<?php echo $Row['FolioTarjetaCirculacion']; ?>" readonly>
        <br>

        <label>Holograma</label>
        <br>
        <input type="text" name="Holograma" id="Holograma" value="<?php echo $Row['Holograma']; ?>" required>
        <br>

        <label>Vigencia</label>
        <br>
        <input type="date" name="Vigencia" id="Vigencia" value="<?php echo $Row['Vigencia']; ?>" required>
        <br>

        <label>Rfc</label>
        <br>
        <input type="text" name="Rfc" id="Rfc" value="<?php echo $Row['Rfc']; ?>" required>
        <br>

        <label>Localidad</label>
        <br>
        <input type="text" name="Localidad" id="Localidad" value="<?php echo $Row['Localidad']; ?>" required>
        <br>

        <label>Municipio</label>
        <br>
        <input type="text" name="Municipio" id="Municipio" value="<?php echo $Row['Municipio']; ?>" required>
        <br>

        <label>FechaExpedicion</label>
        <br>
        <input type="date" name="FechaExpedicion" id="FechaExpedicion" value="<?php echo $Row['FechaExpedicion']; ?>" required>
        <br>

        <label>CveVehicular</label>
        <br>
        <input type="number" name="CveVehicular" id="CveVehicular" value="<?php echo $Row['CveVehicular']; ?>" required>
        <br>

        <label>IdVehiculo</label>
        <br>
        <input type="number" name="IdVehiculo" id="IdVehiculo" value="<?php echo $Row['IdVehiculo']; ?>" required>
        <br>

        <label>IdPropietario</label>
        <br>
        <input type="number" name="IdPropietario" id="IdPropietario" value="<?php echo $Row['IdPropietario']; ?>" required>
        <br>

        <input type="submit" value="Actualizar Tarjeta de Circulación">
        <br>
    </form>
</body>

</html>