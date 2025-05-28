<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Propietario</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdPropietario'])) {
            echo '<div class="mensaje-error">❌ Falta el ID del propietario</div>';
            exit;
        }

        $IdPropietario = $_GET['IdPropietario'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Propietarios WHERE IdPropietario = '$IdPropietario'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">person</span>
            Editar Propietario
        </h1>

        <form class="formularioEdicion" method="GET" action="UPropietarios.php">
            <div class="campo">
                <label class="etiqueta">ID Propietario</label>
                <input class="datos"
                       type="number" 
                       name="IdPropietario" 
                       value="<?php echo $Row['IdPropietario']; ?>" 
                       readonly>
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
                <label class="etiqueta">Año de Nacimiento</label>
                <input class="datos"
                       type="date" 
                       name="AnioNacimiento" 
                       value="<?php echo $Row['AnioNacimiento']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">ID Vehículo</label>
                <input class="datos"
                       type="number" 
                       name="IdVehiculo" 
                       value="<?php echo $Row['IdVehiculo']; ?>">
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