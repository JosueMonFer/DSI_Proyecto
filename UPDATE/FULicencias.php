<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Licencia</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../styles/SUpdate.css">
</head>
<body>
    <div class="contenedor">
        <?php
        include("../controlador.php");

        if (!isset($_GET['NoLicencia'])) {
            echo '<div class="mensaje-error">Falta el número de licencia</div>';
            exit;
        }

        $NoLicencia = $_GET['NoLicencia'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Licencias WHERE NoLicencia = '$NoLicencia'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
        ?>
        
        <h1 class="titulo">
            <span class="icono">assignment_ind</span>
            Editar Licencia
        </h1>

        <form class="formularioEdicion" method="GET" action="ULicencias.php">
            <div class="campo">
                <label class="etiqueta">N° Licencia</label>
                <input class="datos"
                       type="number" 
                       name="NoLicencia" 
                       value="<?php echo $Row['NoLicencia']; ?>" 
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
                <label class="etiqueta">Foto</label>
                <input class="datos"
                       type="text" 
                       name="Foto" 
                       value="<?php echo $Row['Foto']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Observación</label>
                <input class="datos"
                       type="text" 
                       name="Observacion" 
                       value="<?php echo $Row['Observacion']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Fecha Nacimiento</label>
                <input class="datos"
                       type="date" 
                       name="FechaNac" 
                       value="<?php echo $Row['FechaNac']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Fecha Expedición</label>
                <input class="datos"
                       type="date" 
                       name="FechaExped" 
                       value="<?php echo $Row['FechaExped']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Fecha Validez</label>
                <input class="datos"
                       type="date" 
                       name="FechaValid" 
                       value="<?php echo $Row['FechaValid']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Antigüedad</label>
                <input class="datos"
                       type="number" 
                       name="Antiguedad" 
                       value="<?php echo $Row['Antiguedad']; ?>">
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
                <label class="etiqueta">ID Domicilio</label>
                <input class="datos"
                       type="number" 
                       name="IdDomicilio" 
                       value="<?php echo $Row['IdDomicilio']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">Restricción</label>
                <input class="datos"
                       type="text" 
                       name="Restriccion" 
                       value="<?php echo $Row['Restriccion']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Grupo Sanguíneo</label>
                <input class="datos"
                       type="text" 
                       name="GrupoSanguineo" 
                       value="<?php echo $Row['GrupoSanguineo']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">Donador de Órganos</label>
                <input class="datos"
                       type="text" 
                       name="DonadorOrgano" 
                       value="<?php echo $Row['DonadorOrgano']; ?>">
            </div>

            <div class="campo">
                <label class="etiqueta">N° Emergencia</label>
                <input class="datos"
                       type="number" 
                       name="NoEmergencia" 
                       value="<?php echo $Row['NoEmergencia']; ?>"
                       required>
            </div>

            <div class="campo">
                <label class="etiqueta">ID Conductor</label>
                <input class="datos"
                       type="number" 
                       name="IdConductor" 
                       value="<?php echo $Row['IdConductor']; ?>"
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