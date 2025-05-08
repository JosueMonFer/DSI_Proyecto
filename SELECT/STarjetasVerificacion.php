<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM TarjetasDeVerificacion WHERE $Atributo LIKE '%$Criterio%'";

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
        <h2>Resultados de Búsqueda de Verificaciones</h2>
        <table>
            <tr>
                <th>FolioVerificacion</th>
                <th>IdVehiculo</th>
                <th>Entidad</th>
                <th>Municipio</th>
                <th>IdCenVerificacion</th>
                <th>NoLineaVerificacion</th>
                <th>TecnicoVerificador</th>
                <th>FechaExpedicion</th>
                <th>HoraEntrada</th>
                <th>HoraSalida</th>
                <th>MotivoVerificacion</th>
                <th>Semestre</th>
                <th>Vigencia</th>
                <th>CodigoBarra</th>
                <th>CodigoQR</th>
            </tr>";

    // Mostrar los resultados de la consulta
    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['FolioVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['IdVehiculo']) . "</td>
                <td>" . htmlspecialchars($Fila['Entidad']) . "</td>
                <td>" . htmlspecialchars($Fila['Municipio']) . "</td>
                <td>" . htmlspecialchars($Fila['IdCenVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['NoLineaVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['TecnicoVerificador']) . "</td>
                <td>" . htmlspecialchars($Fila['FechaExpedicion']) . "</td>
                <td>" . htmlspecialchars($Fila['HoraEntrada']) . "</td>
                <td>" . htmlspecialchars($Fila['HoraSalida']) . "</td>
                <td>" . htmlspecialchars($Fila['MotivoVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['Semestre']) . "</td>
                <td>" . htmlspecialchars($Fila['Vigencia']) . "</td>
                <td>" . htmlspecialchars($Fila['CodigoBarra']) . "</td>
                <td>" . htmlspecialchars($Fila['CodigoQR']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
