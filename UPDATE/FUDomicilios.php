<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Domicilio</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['IdDomicilio'])) {
            echo '<div class="mensaje-error">Falta el ID del domicilio</div>';
            exit;
        }

        $IdDomicilio = $_GET['IdDomicilio'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Domicilios WHERE IdDomicilio = '$IdDomicilio'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">location_on</span>
            Editar Domicilio
        </h1>

        <form class="formularioEdicion" method="GET" action="UDomicilios.php">
            <div class="campo">
                <label class="etiqueta">ID Domicilio</label>
                <input class="datos"
                       type="number" 
                       name="IdDomicilio" 
                       value="<?php echo $Row['IdDomicilio']; ?>" 
                       readonly>
            </div>

            <div class="campo">
                <label class="etiqueta">Calle</label>
                <input class="datos"
                       type="text" 
                       name="Calle" 
                       value="<?php echo $Row['Calle']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Colonia</label>
                <input class="datos"
                       type="text" 
                       name="Colonia" 
                       value="<?php echo $Row['Colonia']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Número Exterior</label>
                <input class="datos"
                       type="number" 
                       name="NoExterior" 
                       value="<?php echo $Row['NoExterior']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Código Postal</label>
                <input class="datos"
                       type="number" 
                       name="Cp" 
                       value="<?php echo $Row['Cp']; ?>"
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
                <label class="etiqueta">Estado</label>
                <input class="datos"
                       type="text" 
                       name="Estado" 
                       value="<?php echo $Row['Estado']; ?>"
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