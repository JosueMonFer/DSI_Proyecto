<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarjetas de Verificación</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['FolioVerificacion'])) {
            echo "Falta el FolioVerificacion";
            exit;
        }

        $FolioVerificacion = $_GET['FolioVerificacion'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM TarjetasDeVerificacion WHERE FolioVerificacion = '$FolioVerificacion'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UTarjetasVerificacion.php">
        <label><strong>Editar Tarjeta de Verificación</strong></label>
        <br><br>

        <label>FolioVerificacion</label>
        <br>
        <input type="number" name="FolioVerificacion" id="FolioVerificacion" value="<?php echo $Row['FolioVerificacion']; ?>" readonly>
        <br>

        <label>IdVehiculo</label>
        <br>
        <input type="number" name="IdVehiculo" id="IdVehiculo" value="<?php echo $Row['IdVehiculo']; ?>">
        <br>

        <label>Entidad</label>
        <br>
        <input type="text" name="Entidad" id="Entidad" value="<?php echo $Row['Entidad']; ?>">
        <br>

        <label>Municipio</label>
        <br>
        <input type="text" name="Municipio" id="Municipio" value="<?php echo $Row['Municipio']; ?>">
        <br>

        <label>IdCenVerificacion</label>
        <br>
        <input type="number" name="IdCenVerificacion" id="IdCenVerificacion" value="<?php echo $Row['IdCenVerificacion']; ?>">
        <br>

        <label>NoLineaVerificacion</label>
        <br>
        <input type="number" name="NoLineaVerificacion" id="NoLineaVerificacion" value="<?php echo $Row['NoLineaVerificacion']; ?>">
        <br>

        <label>TecnicoVerificador</label>
        <br>
        <input type="number" name="TecnicoVerificador" id="TecnicoVerificador" value="<?php echo $Row['TecnicoVerificador']; ?>">
        <br>

        <label>FechaExpedicion</label>
        <br>
        <input type="date" name="FechaExpedicion" id="FechaExpedicion" value="<?php echo $Row['FechaExpedicion']; ?>">
        <br>

        <label>HoraEntrada</label>
        <br>
        <input type="time" name="HoraEntrada" id="HoraEntrada" value="<?php echo $Row['HoraEntrada']; ?>">
        <br>

        <label>HoraSalida</label>
        <br>
        <input type="time" name="HoraSalida" id="HoraSalida" value="<?php echo $Row['HoraSalida']; ?>">
        <br>

        <label>MotivoVerificacion</label>
        <br>
        <input type="text" name="MotivoVerificacion" id="MotivoVerificacion" value="<?php echo $Row['MotivoVerificacion']; ?>">
        <br>

        <label>Semestre</label>
        <br>
        <input type="number" name="Semestre" id="Semestre" value="<?php echo $Row['Semestre']; ?>">
        <br>

        <label>Vigencia</label>
        <br>
        <input type="date" name="Vigencia" id="Vigencia" value="<?php echo $Row['Vigencia']; ?>">
        <br>

        <label>CodigoBarra</label>
        <br>
        <input type="text" name="CodigoBarra" id="CodigoBarra" value="<?php echo $Row['CodigoBarra']; ?>">
        <br>

        <label>CodigoQR</label>
        <br>
        <input type="text" name="CodigoQR" id="CodigoQR" value="<?php echo $Row['CodigoQR']; ?>">
        <br>

        <input type="submit" value="Actualizar Tarjeta de Verificación">
        <br>
    </form>
</body>

</html>
