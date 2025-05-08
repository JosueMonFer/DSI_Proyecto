<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Vehiculos WHERE $Atributo LIKE '%$Criterio%'";

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
        <title>Resultados de Búsqueda de Vehículos</title>
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
        <h2>Resultados de Búsqueda de Vehículos</h2>
        <table>
            <tr>
                <th>IdVehiculo</th>
                <th>Cilindro</th>
                <th>Combustible</th>
                <th>Llanta</th>
                <th>Asiento</th>
                <th>Holograma</th>
                <th>Color</th>
                <th>Puerta</th>
                <th>Modelo</th>
                <th>Submarca</th>
                <th>Placa</th>
                <th>NumeroSerie</th>
                <th>Clase</th>
                <th>Carroceria</th>
                <th>TipoServicio</th>
                <th>NumeroMotor</th>
                <th>Transmision</th>
            </tr>";

    // Mostrar los resultados de la consulta
    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdVehiculo']) . "</td>
                <td>" . htmlspecialchars($Fila['Cilindro']) . "</td>
                <td>" . htmlspecialchars($Fila['Combustible']) . "</td>
                <td>" . htmlspecialchars($Fila['Llanta']) . "</td>
                <td>" . htmlspecialchars($Fila['Asiento']) . "</td>
                <td>" . htmlspecialchars($Fila['Holograma']) . "</td>
                <td>" . htmlspecialchars($Fila['Color']) . "</td>
                <td>" . htmlspecialchars($Fila['Puerta']) . "</td>
                <td>" . htmlspecialchars($Fila['Modelo']) . "</td>
                <td>" . htmlspecialchars($Fila['Submarca']) . "</td>
                <td>" . htmlspecialchars($Fila['Placa']) . "</td>
                <td>" . htmlspecialchars($Fila['NumeroSerie']) . "</td>
                <td>" . htmlspecialchars($Fila['Clase']) . "</td>
                <td>" . htmlspecialchars($Fila['Carroceria']) . "</td>
                <td>" . htmlspecialchars($Fila['TipoServicio']) . "</td>
                <td>" . htmlspecialchars($Fila['NumeroMotor']) . "</td>
                <td>" . htmlspecialchars($Fila['Transmision']) . "</td>
              </tr>";
    }

    echo "</table>";
    echo "<p>Registros Encontrados: " . $N . "</p>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>
