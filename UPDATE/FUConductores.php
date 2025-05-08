<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conductores</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdConductor'])) {
            echo "Falta el IdConductor";
            exit;
        }

        $IdConductor = $_GET['IdConductor'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Conductores WHERE IdConductor = '$IdConductor'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UConductores.php">
        <label><strong>Editar Conductores</strong></label>
        <br><br>

        <label>IdConductor</label>
        <br>
        <input type="number" name="IdConductor" id="IdConductor" value="<?php echo $Row['IdConductor']; ?>" readonly>
        <br>

        <label>Curp</label>
        <br>
        <input type="text" name="Curp" id="Curp" value="<?php echo $Row['Curp']; ?>">
        <br>

        <label>Nombre</label>
        <br>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $Row['Nombre']; ?>">
        <br>

        <label>Apellido</label>
        <br>
        <input type="text" name="Apellido" id="Apellido" value="<?php echo $Row['Apellido']; ?>">
        <br>

        <label>IdDomicilio</label>
        <br>
        <input type="number" name="IdDomicilio" id="IdDomicilio" value="<?php echo $Row['IdDomicilio']; ?>">
        <br>

        <label>Folio</label>
        <br>
        <input type="number" name="Folio" id="Folio" value="<?php echo $Row['Folio']; ?>">
        <br>

        <label>NoEmergencia</label>
        <br>
        <input type="number" name="NoEmergencia" id="NoEmergencia" value="<?php echo $Row['NoEmergencia']; ?>">
        <br>

        <input type="submit" value="Actualizar Conductor">
        <br>
    </form>
</body>

</html>
