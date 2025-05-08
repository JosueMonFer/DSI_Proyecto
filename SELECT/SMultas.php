<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Multas WHERE $Atributo LIKE '%$Criterio%'";

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
        <h2>Resultados de Búsqueda de Multas</h2>
        <table>
            <tr>
                <th>IdMulta</th>
                <th>Dia</th>
                <th>Mes</th>
                <th>Anio</th>
                <th>Hora</th>
                <th>FolioTarjetaCirculacion</th>
                <th>IdOficial</th>
                <th>FolioVerificacion</th>
                <th>NoLicencia</th>
            </tr>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdMulta']) . "</td>
                <td>" . htmlspecialchars($Fila['Dia']) . "</td>
                <td>" . htmlspecialchars($Fila['Mes']) . "</td>
                <td>" . htmlspecialchars($Fila['Anio']) . "</td>
                <td>" . htmlspecialchars($Fila['Hora']) . "</td>
                <td>" . htmlspecialchars($Fila['FolioTarjetaCirculacion']) . "</td>
                <td>" . htmlspecialchars($Fila['IdOficial']) . "</td>
                <td>" . htmlspecialchars($Fila['FolioVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['NoLicencia']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
