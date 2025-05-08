<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Domicilios</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdDomicilio'])) {
            echo "Falta el IdDomicilio";
            exit;
        }

        $IdDomicilio = $_GET['IdDomicilio'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Domicilios WHERE IdDomicilio = '$IdDomicilio'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UDomicilios.php">
        <label><strong>Editar Domicilios</strong></label>
        <br><br>

        <label>IdDomicilio</label>
        <br>
        <input type="number" name="IdDomicilio" id="IdDomicilio" value="<?php echo $Row['IdDomicilio']; ?>" readonly>
        <br>

        <label>Calle</label>
        <br>
        <input type="text" name="Calle" id="Calle" value="<?php echo $Row['Calle']; ?>" required>
        <br>

        <label>Colonia</label>
        <br>
        <input type="text" name="Colonia" id="Colonia" value="<?php echo $Row['Colonia']; ?>" required>
        <br>

        <label>NoExterior</label>
        <br>
        <input type="number" name="NoExterior" id="NoExterior" value="<?php echo $Row['NoExterior']; ?>" required>
        <br>

        <label>Cp</label>
        <br>
        <input type="number" name="Cp" id="Cp" value="<?php echo $Row['Cp']; ?>" required>
        <br>

        <label>Municipio</label>
        <br>
        <input type="text" name="Municipio" id="Municipio" value="<?php echo $Row['Municipio']; ?>" required>
        <br>

        <label>Estado</label>
        <br>
        <input type="text" name="Estado" id="Estado" value="<?php echo $Row['Estado']; ?>" required>
        <br>

        <input type="submit" value="Actualizar Domicilio">
        <br>
    </form>
</body>

</html>