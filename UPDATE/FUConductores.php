<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conductor</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdConductor'])) {
            echo '<div class="mensaje-error">Falta el ID del conductor</div>';
            exit;
        }

        $IdConductor = $_GET['IdConductor'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Conductores WHERE IdConductor = '$IdConductor'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">directions_car</span>
            Editar Conductor
        </h1>

        <form class="formularioEdicion" method="GET" action="UConductores.php">
            <input type="hidden" name="IdConductor" value="<?php echo $Row['IdConductor']; ?>">

            <div class="campo">
                <label class="etiqueta">CURP</label>
                <input class="datos"
                       type="text" 
                       name="Curp" 
                       value="<?php echo $Row['Curp']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Nombre</label>
                <input class="datos"
                       type="text" 
                       name="Nombre" 
                       value="<?php echo $Row['Nombre']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Apellido</label>
                <input class="datos"
                       type="text" 
                       name="Apellido" 
                       value="<?php echo $Row['Apellido']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">ID Domicilio</label>
                <input class="datos"
                       type="number" 
                       name="IdDomicilio" 
                       value="<?php echo $Row['IdDomicilio']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Folio</label>
                <input class="datos"
                       type="number" 
                       name="Folio" 
                       value="<?php echo $Row['Folio']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Número de Emergencia</label>
                <input class="datos"
                       type="number" 
                       name="NoEmergencia" 
                       value="<?php echo $Row['NoEmergencia']; ?>">
            </div>

            <button type="submit" class="guardar">
                <span class="material-icons">save</span>
                Guardar Cambios
            </button>
            <button type="button" class="regresar" onclick="history.back()">
                <i class="fas fa-arrow-left"></i>
                Regresar
            </button>
        </form>
    </div>
</body>
</html>