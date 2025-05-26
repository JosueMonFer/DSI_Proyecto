<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarjeta Verificación</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['FolioVerificacion'])) {
            echo '<div class="mensaje-error">❌ Falta el folio de verificación</div>';
            exit;
        }

        $FolioVerificacion = $_GET['FolioVerificacion'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM TarjetasDeVerificacion WHERE FolioVerificacion = '$FolioVerificacion'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">verified</span>
            Editar Tarjeta de Verificación
        </h1>

        <form class="formularioEdicion" method="GET" action="UTarjetasVerificacion.php">
            <div class="campo">
                <label class="etiqueta">Folio</label>
                <input class="datos"
                       type="number" 
                       name="FolioVerificacion" 
                       value="<?php echo $Row['FolioVerificacion']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">ID Vehículo</label>
                <input class="datos"
                       type="number" 
                       name="IdVehiculo" 
                       value="<?php echo $Row['IdVehiculo']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Entidad</label>
                <input class="datos"
                       type="text" 
                       name="Entidad" 
                       value="<?php echo $Row['Entidad']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Municipio</label>
                <input class="datos"
                       type="text" 
                       name="Municipio" 
                       value="<?php echo $Row['Municipio']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">ID Centro Verificación</label>
                <input class="datos"
                       type="number" 
                       name="IdCenVerificacion" 
                       value="<?php echo $Row['IdCenVerificacion']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">N° Línea Verificación</label>
                <input class="datos"
                       type="number" 
                       name="NoLineaVerificacion" 
                       value="<?php echo $Row['NoLineaVerificacion']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Técnico Verificador</label>
                <input class="datos"
                       type="number" 
                       name="TecnicoVerificador" 
                       value="<?php echo $Row['TecnicoVerificador']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Fecha Expedición</label>
                <input class="datos"
                       type="date" 
                       name="FechaExpedicion" 
                       value="<?php echo $Row['FechaExpedicion']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Hora Entrada</label>
                <input class="datos"
                       type="time" 
                       name="HoraEntrada" 
                       value="<?php echo $Row['HoraEntrada']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Hora Salida</label>
                <input class="datos"
                       type="time" 
                       name="HoraSalida" 
                       value="<?php echo $Row['HoraSalida']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Motivo Verificación</label>
                <input class="datos"
                       type="text" 
                       name="MotivoVerificacion" 
                       value="<?php echo $Row['MotivoVerificacion']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Semestre</label>
                <input class="datos"
                       type="number" 
                       name="Semestre" 
                       value="<?php echo $Row['Semestre']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Vigencia</label>
                <input class="datos"
                       type="date" 
                       name="Vigencia" 
                       value="<?php echo $Row['Vigencia']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Código de Barras</label>
                <input class="datos"
                       type="text" 
                       name="CodigoBarra" 
                       value="<?php echo $Row['CodigoBarra']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Código QR</label>
                <input class="datos"
                       type="text" 
                       name="CodigoQR" 
                       value="<?php echo $Row['CodigoQR']; ?>">
            </div>

            <button type="submit" class="guardar">
                <span class="material-icons">save</span>
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>