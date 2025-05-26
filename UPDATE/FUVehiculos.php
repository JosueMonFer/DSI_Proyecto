<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vehículo</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdVehiculo'])) {
            echo '<div class="mensaje-error">❌ Falta el ID del vehículo</div>';
            exit;
        }

        $IdVehiculo = $_GET['IdVehiculo'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Vehiculos WHERE IdVehiculo = '$IdVehiculo'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">directions_car</span>
            Editar Vehículo
        </h1>

        <form class="formularioEdicion" method="GET" action="UVehiculos.php">
            <div class="campo">
                <label class="etiqueta">ID Vehículo</label>
                <input class="datos"
                       type="number" 
                       name="IdVehiculo" 
                       value="<?php echo $Row['IdVehiculo']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Cilindros</label>
                <input class="datos"
                       type="number" 
                       name="Cilindro" 
                       value="<?php echo $Row['Cilindro']; ?>"
                       required
                       min="1">
            </div>

            <div class="campo">
                <label class="etiqueta">Combustible</label>
                <input class="datos"
                       type="text" 
                       name="Combustible" 
                       value="<?php echo $Row['Combustible']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">N° Llantas</label>
                <input class="datos"
                       type="number" 
                       name="Llanta" 
                       value="<?php echo $Row['Llanta']; ?>"
                       required
                       min="1">
            </div>

            <div class="campo">
                <label class="etiqueta">N° Asientos</label>
                <input class="datos"
                       type="number" 
                       name="Asiento" 
                       value="<?php echo $Row['Asiento']; ?>"
                       required
                       min="1">
            </div>

            <div class="campo">
                <label class="etiqueta">Holograma</label>
                <input class="datos"
                       type="text" 
                       name="Holograma" 
                       value="<?php echo $Row['Holograma']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Color</label>
                <input class="datos"
                       type="text" 
                       name="Color" 
                       value="<?php echo $Row['Color']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">N° Puertas</label>
                <input class="datos"
                       type="number" 
                       name="Puerta" 
                       value="<?php echo $Row['Puerta']; ?>"
                       min="1">
            </div>

            <div class="campo">
                <label class="etiqueta">Modelo</label>
                <input class="datos"
                       type="text" 
                       name="Modelo" 
                       value="<?php echo $Row['Modelo']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Submarca</label>
                <input class="datos"
                       type="text" 
                       name="Submarca" 
                       value="<?php echo $Row['Submarca']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Placa</label>
                <input class="datos"
                       type="text" 
                       name="Placa" 
                       value="<?php echo $Row['Placa']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">N° Serie</label>
                <input class="datos"
                       type="number" 
                       name="NumeroSerie" 
                       value="<?php echo $Row['NumeroSerie']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Clase</label>
                <input class="datos"
                       type="text" 
                       name="Clase" 
                       value="<?php echo $Row['Clase']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Carrocería</label>
                <input class="datos"
                       type="text" 
                       name="Carroceria" 
                       value="<?php echo $Row['Carroceria']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Tipo de Servicio</label>
                <input class="datos"
                       type="text" 
                       name="TipoServicio" 
                       value="<?php echo $Row['TipoServicio']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">N° Motor</label>
                <input class="datos"
                       type="number" 
                       name="NumeroMotor" 
                       value="<?php echo $Row['NumeroMotor']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Transmisión</label>
                <input class="datos"
                       type="number" 
                       name="Transmision" 
                       value="<?php echo $Row['Transmision']; ?>"
                       required
                       min="0">
            </div>

            <button type="submit" class="guardar">
                <span class="material-icons">save</span>
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>