<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM CentrosVerificacion WHERE $Atributo LIKE '%$Criterio%'";

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
        <h2>Resultados de Búsqueda de Centros de Verificación</h2>
        <table border='1'>
            <tr>
                <th>IdCenVerificacion</th>
                <th>NoLinea</th>
                <th>Verificacion</th>
                <th>IdDomicilio</th>
            </tr>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdCenVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['NoLinea']) . "</td>
                <td>" . htmlspecialchars($Fila['Verificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['IdDomicilio']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
