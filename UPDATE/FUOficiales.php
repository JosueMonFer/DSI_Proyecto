<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Oficiales</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdOficial'])) {
            echo "Falta el IdOficial";
            exit;
        }

        $IdOficial = $_GET['IdOficial'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Oficiales WHERE IdOficial = '$IdOficial'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UOficiales.php">
        <label><strong>Editar Oficiales</strong></label>
        <br><br>

        <label>IdOficial</label>
        <br>
        <input type="number" name="IdOficial" id="IdOficial" value="<?php echo $Row['IdOficial']; ?>" readonly>
        <br>

        <label>Cargo</label>
        <br>
        <input type="text" name="Cargo" id="Cargo" value="<?php echo $Row['Cargo']; ?>" required>
        <br>

        <label>Nombre</label>
        <br>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $Row['Nombre']; ?>" required>
        <br>

        <label>Apellido</label>
        <br>
        <input type="text" name="Apellido" id="Apellido" value="<?php echo $Row['Apellido']; ?>" required>
        <br>

        <input type="submit" value="Actualizar Oficial">
        <br>
    </form>
</body>

</html>