<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Licencias</title>
</head>

<body>
    <?php
        include("../controlador.php");

        if (!isset($_GET['NoLicencia'])) {
            echo "Falta el NoLicencia";
            exit;
        }

        $NoLicencia = $_GET['NoLicencia'];
        $Conexion = Conectar();
        $ResultSet = Ejecutar($Conexion, "SELECT * FROM Licencias WHERE NoLicencia = '$NoLicencia'");
        $Row = mysqli_fetch_assoc($ResultSet);
        Desconectar($Conexion);
    ?>

    <form method="get" action="ULicencias.php">
        <label><strong>Editar Licencias</strong></label>
        <br><br>

        <label>NoLicencia</label>
        <br>
        <input type="number" name="NoLicencia" id="NoLicencia" value="<?php echo $Row['NoLicencia']; ?>" readonly>
        <br>

        <label>Nombre</label>
        <br>
        <input type="text" name="Nombre" id="Nombre" value="<?php echo $Row['Nombre']; ?>" required>
        <br>

        <label>Foto</label>
        <br>
        <input type="text" name="Foto" id="Foto" value="<?php echo $Row['Foto']; ?>" required>
        <br>

        <label>Observacion</label>
        <br>
        <input type="text" name="Observacion" id="Observacion" value="<?php echo $Row['Observacion']; ?>" required>
        <br>

        <label>FechaNac</label>
        <br>
        <input type="date" name="FechaNac" id="FechaNac" value="<?php echo $Row['FechaNac']; ?>" required>
        <br>

        <label>FechaExped</label>
        <br>
        <input type="date" name="FechaExped" id="FechaExped" value="<?php echo $Row['FechaExped']; ?>" required>
        <br>

        <label>FechaValid</label>
        <br>
        <input type="date" name="FechaValid" id="FechaValid" value="<?php echo $Row['FechaValid']; ?>" required>
        <br>

        <label>Antiguedad</label>
        <br>
        <input type="number" name="Antiguedad" id="Antiguedad" value="<?php echo $Row['Antiguedad']; ?>">
        <br>

        <label>Firma</label>
        <br>
        <input type="text" name="Firma" id="Firma" value="<?php echo $Row['Firma']; ?>" required>
        <br>

        <label>IdDomicilio</label>
        <br>
        <input type="number" name="IdDomicilio" id="IdDomicilio" value="<?php echo $Row['IdDomicilio']; ?>" required>
        <br>

        <label>Restriccion</label>
        <br>
        <input type="text" name="Restriccion" id="Restriccion" value="<?php echo $Row['Restriccion']; ?>">
        <br>

        <label>GrupoSanguineo</label>
        <br>
        <input type="text" name="GrupoSanguineo" id="GrupoSanguineo" value="<?php echo $Row['GrupoSanguineo']; ?>">
        <br>

        <label>DonadorOrgano</label>
        <br>
        <input type="text" name="DonadorOrgano" id="DonadorOrgano" value="<?php echo $Row['DonadorOrgano']; ?>">
        <br>

        <label>NoEmergencia</label>
        <br>
        <input type="number" name="NoEmergencia" id="NoEmergencia" value="<?php echo $Row['NoEmergencia']; ?>" required>
        <br>

        <label>IdConductor</label>
        <br>
        <input type="number" name="IdConductor" id="IdConductor" value="<?php echo $Row['IdConductor']; ?>" required>
        <br>

        <input type="submit" value="Actualizar Licencia">
        <br>
    </form>
</body>

</html>