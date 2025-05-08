<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Domicilios WHERE $Atributo LIKE '%$Criterio%'";

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
        <h2>Resultados de Búsqueda de Domicilios</h2>
        <table>
            <tr>
                <th>IdDomicilio</th>
                <th>Calle</th>
                <th>Colonia</th>
                <th>NoExterior</th>
                <th>Cp</th>
                <th>Municipio</th>
                <th>Estado</th>
            </tr>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdDomicilio']) . "</td>
                <td>" . htmlspecialchars($Fila['Calle']) . "</td>
                <td>" . htmlspecialchars($Fila['Colonia']) . "</td>
                <td>" . htmlspecialchars($Fila['NoExterior']) . "</td>
                <td>" . htmlspecialchars($Fila['Cp']) . "</td>
                <td>" . htmlspecialchars($Fila['Municipio']) . "</td>
                <td>" . htmlspecialchars($Fila['Estado']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>