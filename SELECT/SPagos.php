<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Pagos WHERE $Atributo LIKE '%$Criterio%'";

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
        <h2>Resultados de Búsqueda de Pagos</h2>
        <table>
            <tr>
                <th>IdPago</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>FechaNacimiento</th>
                <th>FechaExpedicion</th>
                <th>FechaValidacion</th>
                <th>Monto</th>
                <th>Firma</th>
                <th>FolioTarjetaCirculacion</th>
            </tr>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdPago']) . "</td>
                <td>" . htmlspecialchars($Fila['Nombre']) . "</td>
                <td>" . htmlspecialchars($Fila['Apellido']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaNacimiento']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaExpedicion']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaValidacion']) . "</td>
                <td>" . htmlspecialchars($Fila['Monto']) . "</td>
                <td>" . htmlspecialchars($Fila['Firma']) . "</td>
                <td>" . htmlspecialchars($Fila['FolioTarjetaCirculacion']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
