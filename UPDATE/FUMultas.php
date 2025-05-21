<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Multa</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdMulta'])) {
            echo '<div class="mensaje-error">Falta el ID de la multa</div>';
            exit;
        }

        $IdMulta = $_GET['IdMulta'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Multas WHERE IdMulta = '$IdMulta'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">monetization_on</span>
            Editar Multa
        </h1>

        <form class="formularioEdicion" method="GET" action="UMultas.php">
            <div class="campo">
                <label class="etiqueta">ID Multa</label>
                <input class="datos"
                       type="number" 
                       name="IdMulta" 
                       value="<?php echo $Row['IdMulta']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Día</label>
                <input class="datos"
                       type="number" 
                       name="Dia" 
                       value="<?php echo $Row['Dia']; ?>"
                       required
                       min="1" max="31">
            </div>

            <div class="campo">
                <label class="etiqueta">Mes</label>
                <input class="datos"
                       type="number" 
                       name="Mes" 
                       value="<?php echo $Row['Mes']; ?>"
                       required
                       min="1" max="12">
            </div>

            <div class="campo">
                <label class="etiqueta">Año</label>
                <input class="datos"
                       type="number" 
                       name="Anio" 
                       value="<?php echo $Row['Anio']; ?>"
                       required
                       min="2000">
            </div>

            <div class="campo">
                <label class="etiqueta">Hora</label>
                <input class="datos"
                       type="time" 
                       name="Hora" 
                       value="<?php echo $Row['Hora']; ?>"
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

            <div class="campo">
                <label class="etiqueta">ID Oficial</label>
                <input class="datos"
                       type="number" 
                       name="IdOficial" 
                       value="<?php echo $Row['IdOficial']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Folio Verificación</label>
                <input class="datos"
                       type="number" 
                       name="FolioVerificacion" 
                       value="<?php echo $Row['FolioVerificacion']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">N° Licencia</label>
                <input class="datos"
                       type="number" 
                       name="NoLicencia" 
                       value="<?php echo $Row['NoLicencia']; ?>"
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