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
            <h2><i class='fas fa-clipboard-check'></i> Verificaciones Vehiculares</h2>
            <div class='tabla'>
                <table>
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>ID Vehículo</th>
                            <th>Entidad</th>
                            <th>Municipio</th>
                            <th>ID Centro</th>
                            <th>Línea Verificación</th>
                            <th>Técnico</th>
                            <th>Fecha Expedición</th>
                            <th>Hora Entrada</th>
                            <th>Hora Salida</th>
                            <th>Motivo</th>
                            <th>Semestre</th>
                            <th>Vigencia</th>
                            <th>Código Barras</th>
                            <th>Código QR</th>
                        </tr>
                    </thead>
                    <tbody>";

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