<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['IdVehiculo'])) {
            echo "Falta el IdVehiculo";
            exit;
        }

        $IdVehiculo = $_GET['IdVehiculo'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Vehiculos WHERE IdVehiculo = '$IdVehiculo'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="UVehiculos.php">
        <label><strong>Editar Vehículo</strong></label>
        <br><br>

        <label>IdVehiculo</label>
        <br>
        <input type="number" name="IdVehiculo" id="IdVehiculo" value="<?php echo $Row['IdVehiculo']; ?>" readonly>
        <br>

        <label>Cilindro</label>
        <br>
        <input type="number" name="Cilindro" id="Cilindro" value="<?php echo $Row['Cilindro']; ?>" required="required">
        <br>

        <label>Combustible</label>
        <br>
        <input type="text" name="Combustible" id="Combustible" value="<?php echo $Row['Combustible']; ?>" required="required">
        <br>

        <label>Llanta</label>
        <br>
        <input type="number" name="Llanta" id="Llanta" value="<?php echo $Row['Llanta']; ?>" required="required">
        <br>

        <label>Asiento</label>
        <br>
        <input type="number" name="Asiento" id="Asiento" value="<?php echo $Row['Asiento']; ?>" required="required">
        <br>

        <label>Holograma</label>
        <br>
        <input type="text" name="Holograma" id="Holograma" value="<?php echo $Row['Holograma']; ?>">
        <br>

        <label>Color</label>
        <br>
        <input type="text" name="Color" id="Color" value="<?php echo $Row['Color']; ?>">
        <br>

        <label>Puerta</label>
        <br>
        <input type="number" name="Puerta" id="Puerta" value="<?php echo $Row['Puerta']; ?>">
        <br>

        <label>Modelo</label>
        <br>
        <input type="text" name="Modelo" id="Modelo" value="<?php echo $Row['Modelo']; ?>" required="required">
        <br>

        <label>Submarca</label>
        <br>
        <input type="text" name="Submarca" id="Submarca" value="<?php echo $Row['Submarca']; ?>">
        <br>

        <label>Placa</label>
        <br>
        <input type="text" name="Placa" id="Placa" value="<?php echo $Row['Placa']; ?>" required="required">
        <br>

        <label>NumeroSerie</label>
        <br>
        <input type="number" name="NumeroSerie" id="NumeroSerie" value="<?php echo $Row['NumeroSerie']; ?>" required="required">
        <br>

        <label>Clase</label>
        <br>
        <input type="text" name="Clase" id="Clase" value="<?php echo $Row['Clase']; ?>">
        <br>

        <label>Carroceria</label>
        <br>
        <input type="text" name="Carroceria" id="Carroceria" value="<?php echo $Row['Carroceria']; ?>">
        <br>

        <label>TipoServicio</label>
        <br>
        <input type="text" name="TipoServicio" id="TipoServicio" value="<?php echo $Row['TipoServicio']; ?>">
        <br>

        <label>NumeroMotor</label>
        <br>
        <input type="number" name="NumeroMotor" id="NumeroMotor" value="<?php echo $Row['NumeroMotor']; ?>">
        <br>

        <label>Transmision</label>
        <br>
        <input type="number" name="Transmision" id="Transmision" value="<?php echo $Row['Transmision']; ?>" required="required">
        <br>

        <input type="submit" value="Actualizar Vehículo">
        <br>
    </form>
</body>

</html>
