<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Multas</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdMulta'])) {
            echo "Falta el IdMulta";
            exit;
        }

        $IdMulta = $_GET['IdMulta'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Multas WHERE IdMulta = '$IdMulta'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UMultas.php">
        <label><strong>Editar Multas</strong></label>
        <br><br>

        <label>IdMulta</label>
        <br>
        <input type="number" name="IdMulta" id="IdMulta" value="<?php echo $Row['IdMulta']; ?>" readonly>
        <br>

        <label>Dia</label>
        <br>
        <input type="number" name="Dia" id="Dia" value="<?php echo $Row['Dia']; ?>" required>
        <br>

        <label>Mes</label>
        <br>
        <input type="number" name="Mes" id="Mes" value="<?php echo $Row['Mes']; ?>" required>
        <br>

        <label>Año</label>
        <br>
        <input type="number" name="Anio" id="Anio" value="<?php echo $Row['Anio']; ?>" required>
        <br>

        <label>Hora</label>
        <br>
        <input type="time" name="Hora" id="Hora" value="<?php echo $Row['Hora']; ?>" required>
        <br>

        <label>FolioTarjetaCirculacion</label>
        <br>
        <input type="number" name="FolioTarjetaCirculacion" id="FolioTarjetaCirculacion" value="<?php echo $Row['FolioTarjetaCirculacion']; ?>" required>
        <br>

        <label>IdOficial</label>
        <br>
        <input type="number" name="IdOficial" id="IdOficial" value="<?php echo $Row['IdOficial']; ?>" required>
        <br>

        <label>FolioVerificacion</label>
        <br>
        <input type="number" name="FolioVerificacion" id="FolioVerificacion" value="<?php echo $Row['FolioVerificacion']; ?>" required>
        <br>

        <label>NoLicencia</label>
        <br>
        <input type="number" name="NoLicencia" id="NoLicencia" value="<?php echo $Row['NoLicencia']; ?>" required>
        <br>

        <input type="submit" value="Actualizar Multa">
        <br>
    </form>
</body>

</html>