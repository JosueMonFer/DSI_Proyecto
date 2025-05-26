<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pago</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdPago'])) {
            echo '<div class="mensaje-error">Falta el ID del pago</div>';
            exit;
        }

        $IdPago = $_GET['IdPago'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Pagos WHERE IdPago = '$IdPago'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">payments</span>
            Editar Pago
        </h1>

        <form class="formularioEdicion" method="GET" action="UPagos.php">
            <div class="campo">
                <label class="etiqueta">ID Pago</label>
                <input class="datos"
                       type="number" 
                       name="IdPago" 
                       value="<?php echo $Row['IdPago']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Nombre</label>
                <input class="datos"
                       type="text" 
                       name="Nombre" 
                       value="<?php echo $Row['Nombre']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Apellido</label>
                <input class="datos"
                       type="text" 
                       name="Apellido" 
                       value="<?php echo $Row['Apellido']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Fecha Nacimiento</label>
                <input class="datos"
                       type="date" 
                       name="FechaNacimiento" 
                       value="<?php echo $Row['FechaNacimiento']; ?>"
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
                <label class="etiqueta">Fecha Validación</label>
                <input class="datos"
                       type="date" 
                       name="FechaValidacion" 
                       value="<?php echo $Row['FechaValidacion']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Monto</label>
                <input class="datos"
                       type="number" 
                       name="Monto" 
                       value="<?php echo $Row['Monto']; ?>"
                       required
                       step="0.01">
            </div>

            <div class="campo">
                <label class="etiqueta">Firma</label>
                <input class="datos"
                       type="text" 
                       name="Firma" 
                       value="<?php echo $Row['Firma']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Folio Tarjeta Circulación</label>
                <input class="datos"
                       type="number" 
                       name="FolioTarjetaCirculacion" 
                       value="<?php echo $Row['FolioTarjetaCirculacion']; ?>"
                       required>
            </div>

            <button type="submit" class="guardar">
                <span class="material-icons">save</span>
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>