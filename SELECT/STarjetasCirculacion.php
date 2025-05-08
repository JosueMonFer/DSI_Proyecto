<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM TarjetasCirculacion WHERE $Atributo LIKE '%$Criterio%'";

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
        <h2>Resultados de Búsqueda de Tarjetas de Circulación</h2>
        <table>
            <tr>
                <th>FolioTarjetaCirculacion</th>
                <th>Holograma</th>
                <th>Vigencia</th>
                <th>Rfc</th>
                <th>Localidad</th>
                <th>Municipio</th>
                <th>FechaExpedicion</th>
                <th>CveVehicular</th>
                <th>IdVehiculo</th>
                <th>IdPropietario</th>
            </tr>";

    // Mostrar los resultados de la consulta
    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['FolioTarjetaCirculacion']) . "</td>
                <td>" . htmlspecialchars($Fila['Holograma']) . "</td>
                <td>" . htmlspecialchars($Fila['Vigencia']) . "</td>
                <td>" . htmlspecialchars($Fila['Rfc']) . "</td>
                <td>" . htmlspecialchars($Fila['Localidad']) . "</td>
                <td>" . htmlspecialchars($Fila['Municipio']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaExpedicion']) . "</td>
                <td>" . htmlspecialchars($Fila['CveVehicular']) . "</td>
                <td>" . htmlspecialchars($Fila['IdVehiculo']) . "</td>
                <td>" . htmlspecialchars($Fila['IdPropietario']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
