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
            <h2><i class='fas fa-car'></i> Tarjetas de Circulación</h2>
            <div class='tabla'>
                <table>
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Holograma</th>
                            <th>Vigencia</th>
                            <th>RFC</th>
                            <th>Localidad</th>
                            <th>Municipio</th>
                            <th>Fecha Expedición</th>
                            <th>Clave Vehicular</th>
                            <th>ID Vehículo</th>
                            <th>ID Propietario</th>
                        </tr>
                    </thead>
                    <tbody>";

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

    echo "</tbody>
                </table>
            </div>
            <p class='registros'>Registros encontrados: " . $N . "</p>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>