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
    $Columnas = mysqli_field_count($Conexion);

    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Resultados de Búsqueda</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            table, th, td {
                border: 1px solid black;
            }
            th, td {
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }   
        </style>
    </head>
    <body>
        <h2>Resultados de Búsqueda de Licencias</h2>
        <table>
            <tr>
                <th>NoLicencia</th>
                <th>Nombre</th>
                <th>Foto</th>
                <th>Observacion</th>
                <th>FechaNac</th>
                <th>FechaExped</th>
                <th>FechaValid</th>
                <th>Antiguedad</th>
                <th>Firma</th>
                <th>IdDomicilio</th>
                <th>Restriccion</th>
                <th>GrupoSanguineo</th>
                <th>NoEmergencia</th>
                <th>IdConductor</th>
            </tr>";

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

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
