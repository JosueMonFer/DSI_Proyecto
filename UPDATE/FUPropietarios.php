<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Propietarios</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdPropietario'])) {
            echo "❌ Falta el IdPropietario.";
            exit;
        }

        $IdPropietario = $_GET['IdPropietario'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Propietarios WHERE IdPropietario = '$IdPropietario'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>
    <form method="get" action="UPropietarios.php">
        <label>Editar Propietarios</label>
        <br>
        <label>IdPropietario</label>
        <br>
        <input type="number" name="IdPropietario" id="IdPropietario" value="<?php echo $Row['IdPropietario']; ?>" readonly>
        <br>
        <label>Nombre</label>
        <br>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $Row['Nombre']; ?>">
        <br>
        <label>Apellido</label>
        <br>
        <input type="text" name="Apellido" id="Apellido" value="<?php echo $Row['Apellido']; ?>">
        <br>
        <label>AñoNacimiento</label>
        <br>
        <input type="date" name="AnioNacimiento" id="AnioNacimiento" value="<?php echo $Row['AnioNacimiento']; ?>">
        <br>
        <label>IdVehiculo</label>
        <br>
        <input type="number" name="IdVehiculo" id="IdVehiculo" value="<?php echo $Row['IdVehiculo']; ?>">
        <br>
        <input type="submit">
        <br>
    </form>
</body>

</html>