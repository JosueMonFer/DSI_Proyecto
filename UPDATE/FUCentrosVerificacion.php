<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Centro Verificación</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdCenVerificacion'])) {
            echo '<div class="mensaje-error">Falta el ID del centro</div>';
            exit;
        }

        $IdCenVerificacion = $_GET['IdCenVerificacion'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM CentrosVerificacion WHERE IdCenVerificacion = '$IdCenVerificacion'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">edit</span>
            Editar Centro de Verificación
        </h1>

        <form class="formularioEdicion" method="GET" action="UCentrosVerificacion.php">
            <div class="campo">
                <label class="etiqueta">ID Centro</label>
                <input class="datos"
                       type="number" 
                       name="IdCenVerificacion" 
                       value="<?php echo $Row['IdCenVerificacion']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Número de Línea</label>
                <input class="datos"
                       type="text" 
                       name="NoLinea" 
                       value="<?php echo $Row['NoLinea']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Verificación</label>
                <input class="datos"
                       type="text" 
                       name="Verificacion" 
                       value="<?php echo $Row['Verificacion']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">ID Domicilio</label>
                <input class="datos"
                       type="number" 
                       name="IdDomicilio" 
                       value="<?php echo $Row['IdDomicilio']; ?>">
            </div>

            <button type="submit" class="guardar">
                <span class="material-icons">save</span>
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>