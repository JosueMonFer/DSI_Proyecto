<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Oficial</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdOficial'])) {
            echo '<div class="mensaje-error">Falta el ID del oficial</div>';
            exit;
        }

        $IdOficial = $_GET['IdOficial'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Oficiales WHERE IdOficial = '$IdOficial'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">security</span>
            Editar Oficial
        </h1>

        <form class="formularioEdicion" method="GET" action="UOficiales.php">
            <div class="campo">
                <label class="etiqueta">ID Oficial</label>
                <input class="datos"
                       type="number" 
                       name="IdOficial" 
                       value="<?php echo $Row['IdOficial']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Cargo</label>
                <input class="datos"
                       type="text" 
                       name="Cargo" 
                       value="<?php echo $Row['Cargo']; ?>"
                       required>
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

            <button type="submit" class="guardar">
                <span class="material-icons">save</span>
                Guardar Cambios
            </button>
        </form>
    </div>
</body>
</html>