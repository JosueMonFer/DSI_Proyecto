<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Licencias WHERE $Atributo LIKE '%$Criterio%'";

    // Enviar la instrucción al SMBD
    include("../controlador.php");
    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    // Procesamiento
    $N = mysqli_num_rows($ResultSet);

    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Resultados de Búsqueda</title>
        <link rel='stylesheet' href='../styles/SResultadoInsert.css'>

        <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    </head>
    <body>
        <div class='contenedor'>
            <h2><i class='fas fa-id-card'></i> Resultados de Licencias</h2>
            <div class='tabla'>
                <table>
                    <thead>
                        <tr>
                            <th>N° Licencia</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Observación</th>
                            <th>Fecha Nacimiento</th>
                            <th>Fecha Expedición</th>
                            <th>Fecha Validación</th>
                            <th>Antigüedad</th>
                            <th>Firma</th>
                            <th>ID Domicilio</th>
                            <th>Restricción</th>
                            <th>Grupo Sanguíneo</th>
                            <th>N° Emergencia</th>
                            <th>ID Conductor</th>
                        </tr>
                    </thead>
                    <tbody>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['NoLicencia']) . "</td>
                <td>" . htmlspecialchars($Fila['Nombre']) . "</td>
                <td>" . htmlspecialchars($Fila['Foto']) . "</td>
                <td>" . htmlspecialchars($Fila['Observacion']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaNac']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaExped']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaValid']) . "</td>
                <td>" . htmlspecialchars($Fila['Antiguedad']) . "</td>
                <td>" . htmlspecialchars($Fila['Firma']) . "</td>
                <td>" . htmlspecialchars($Fila['IdDomicilio']) . "</td>
                <td>" . htmlspecialchars($Fila['Restriccion']) . "</td>
                <td>" . htmlspecialchars($Fila['GrupoSanguineo']) . "</td>
                <td>" . htmlspecialchars($Fila['NoEmergencia']) . "</td>
                <td>" . htmlspecialchars($Fila['IdConductor']) . "</td>
              </tr>";
    }

    echo "</tbody>
                </table>
            </div>
            <p class='registros'>Registros encontrados: " . $N . "</p>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>