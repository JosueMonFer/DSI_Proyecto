<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarjeta Circulación</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['FolioTarjetaCirculacion'])) {
            echo '<div class="mensaje-error">❌ Falta el folio de la tarjeta</div>';
            exit;
        }

        $FolioTarjetaCirculacion = $_GET['FolioTarjetaCirculacion'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM TarjetasCirculacion WHERE FolioTarjetaCirculacion = '$FolioTarjetaCirculacion'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">credit_card</span>
            Editar Tarjeta de Circulación
        </h1>

        <form class="formularioEdicion" method="GET" action="UTarjetasCirculacion.php">
            <div class="campo">
                <label class="etiqueta">Folio</label>
                <input class="datos"
                       type="number" 
                       name="FolioTarjetaCirculacion" 
                       value="<?php echo $Row['FolioTarjetaCirculacion']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Holograma</label>
                <input class="datos"
                       type="text" 
                       name="Holograma" 
                       value="<?php echo $Row['Holograma']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Vigencia</label>
                <input class="datos"
                       type="date" 
                       name="Vigencia" 
                       value="<?php echo $Row['Vigencia']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">RFC</label>
                <input class="datos"
                       type="text" 
                       name="Rfc" 
                       value="<?php echo $Row['Rfc']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Localidad</label>
                <input class="datos"
                       type="text" 
                       name="Localidad" 
                       value="<?php echo $Row['Localidad']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Municipio</label>
                <input class="datos"
                       type="text" 
                       name="Municipio" 
                       value="<?php echo $Row['Municipio']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Fecha Expedición</label>
                <input class="datos"
                       type="date" 
                       name="FechaExpedicion" 
                       value="<?php echo $Row['FechaExpedicion']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Clave Vehicular</label>
                <input class="datos"
                       type="number" 
                       name="CveVehicular" 
                       value="<?php echo $Row['CveVehicular']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">ID Vehículo</label>
                <input class="datos"
                       type="number" 
                       name="IdVehiculo" 
                       value="<?php echo $Row['IdVehiculo']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">ID Propietario</label>
                <input class="datos"
                       type="number" 
                       name="IdPropietario" 
                       value="<?php echo $Row['IdPropietario']; ?>"
                       required>
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