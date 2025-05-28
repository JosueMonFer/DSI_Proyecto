<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Conductores WHERE $Atributo LIKE '%$Criterio%'";

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
            <h2><i class='fas fa-user'></i> Resultados de Conductores</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Conductor</th>
                        <th>CURP</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>ID Domicilio</th>
                        <th>Folio</th>
                        <th>N° Emergencia</th>
                    </tr>
                </thead>
                <tbody>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdConductor']) . "</td>
                <td>" . htmlspecialchars($Fila['Curp']) . "</td>
                <td>" . htmlspecialchars($Fila['Nombre']) . "</td>
                <td>" . htmlspecialchars($Fila['Apellido']) . "</td>
                <td>" . htmlspecialchars($Fila['IdDomicilio']) . "</td>
                <td>" . htmlspecialchars($Fila['Folio']) . "</td>
                <td>" . htmlspecialchars($Fila['NoEmergencia']) . "</td>
              </tr>";
    }

    echo "</tbody>
            </table>
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