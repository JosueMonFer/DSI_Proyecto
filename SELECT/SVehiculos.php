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

    echo "<!DOCTYPE html>
    <html lang='es'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Resultados de Búsqueda de Vehículos</title>
        <link rel='stylesheet' href='../styles/SResultadoInsert.css'>

        <link href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap' rel='stylesheet'>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css'>
    </head>
    <body>
        <div class='contenedor'>
            <h2><i class='fas fa-car-side'></i> Vehículos Registrados</h2>
            <div class='tabla'>
                <table>
                    <thead>
                        <tr>
                            <th>ID Vehículo</th>
                            <th>Cilindro</th>
                            <th>Combustible</th>
                            <th>Llanta</th>
                            <th>Asiento</th>
                            <th>Holograma</th>
                            <th>Color</th>
                            <th>Puertas</th>
                            <th>Modelo</th>
                            <th>Submarca</th>
                            <th>Placa</th>
                            <th>N° Serie</th>
                            <th>Clase</th>
                            <th>Carrocería</th>
                            <th>Tipo Servicio</th>
                            <th>N° Motor</th>
                            <th>Transmisión</th>
                        </tr>
                    </thead>
                    <tbody>";

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

    echo "</tbody>
                </table>
            </div>
            <p class='registros'>Registros encontrados: " . $N . "</p>
            <div class='contenedorBotones'>
                <button type='button' class='botonEnviar' onclick='history.back()'>
                    <i class='fas fa-arrow-left'></i>
                    Regresar
                </button>
            </div>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>