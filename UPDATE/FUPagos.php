<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pagos</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdPago'])) {
            echo "Falta el IdPago";
            exit;
        }

        $IdPago = $_GET['IdPago'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Pagos WHERE IdPago = '$IdPago'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UPagos.php">
        <label><strong>Editar Pago</strong></label>
        <br><br>

        <label>IdPago</label>
        <br>
        <input type="number" name="IdPago" id="IdPago" value="<?php echo $Row['IdPago']; ?>" readonly>
        <br>

        <label>Nombre</label>
        <br>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $Row['Nombre']; ?>" required>
        <br>

        <label>Apellido</label>
        <br>
        <input type="text" name="Apellido" id="Apellido" value="<?php echo $Row['Apellido']; ?>" required>
        <br>

        <label>FechaNacimiento</label>
        <br>
        <input type="date" name="FechaNacimiento" id="FechaNacimiento" value="<?php echo $Row['FechaNacimiento']; ?>" required>
        <br>

        <label>FechaExpedicion</label>
        <br>
        <input type="date" name="FechaExpedicion" id="FechaExpedicion" value="<?php echo $Row['FechaExpedicion']; ?>" required>
        <br>

        <label>FechaValidacion</label>
        <br>
        <input type="date" name="FechaValidacion" id="FechaValidacion" value="<?php echo $Row['FechaValidacion']; ?>" required>
        <br>

        <label>Monto</label>
        <br>
        <input type="number" name="Monto" id="Monto" value="<?php echo $Row['Monto']; ?>" required>
        <br>

        <label>Firma</label>
        <br>
        <input type="text" name="Firma" id="Firma" value="<?php echo $Row['Firma']; ?>" required>
        <br>

        <label>FolioTarjetaCirculacion</label>
        <br>
        <input type="number" name="FolioTarjetaCirculacion" id="FolioTarjetaCirculacion" value="<?php echo $Row['FolioTarjetaCirculacion']; ?>" required>
        <br>

        <input type="submit" value="Actualizar Pago">
        <br>
    </form>
</body>

</html>
