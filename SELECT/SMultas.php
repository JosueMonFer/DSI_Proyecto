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
            <h2><i class='fas fa-traffic-light'></i> Resultados de Multas</h2>
            <div class='tabla'>
                <table>
                    <thead>
                        <tr>
                            <th>ID Multa</th>
                            <th>Día</th>
                            <th>Mes</th>
                            <th>Año</th>
                            <th>Hora</th>
                            <th>Folio Tarjeta</th>
                            <th>ID Oficial</th>
                            <th>Folio Verificación</th>
                            <th>N° Licencia</th>
                        </tr>
                    </thead>
                    <tbody>";

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

    echo "</tbody>
                </table>
            </div>
            <p class='registros'>Registros encontrados: " . $N . "</p>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>