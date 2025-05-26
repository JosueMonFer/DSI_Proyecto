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
            <h2><i class='fas fa-credit-card'></i> Resultados de Pagos</h2>
            <div class='tabla-container'>
                <table>
                    <thead>
                        <tr>
                            <th>ID Pago</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Fecha Nacimiento</th>
                            <th>Fecha Expedición</th>
                            <th>Fecha Validación</th>
                            <th>Monto</th>
                            <th>Firma</th>
                            <th>Folio Tarjeta</th>
                        </tr>
                    </thead>
                    <tbody>";

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

    echo "</tbody>
                </table>
            </div>
            <p class='registros'>Registros encontrados: " . $N . "</p>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>