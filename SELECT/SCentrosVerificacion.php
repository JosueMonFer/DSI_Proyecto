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
            <h2><i class='fas fa-search'></i> Resultados de Búsqueda</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Centro</th>
                        <th>N° Línea</th>
                        <th>Verificación</th>
                        <th>ID Domicilio</th>
                    </tr>
                </thead>
                <tbody>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdCenVerificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['NoLinea']) . "</td>
                <td>" . htmlspecialchars($Fila['Verificacion']) . "</td>
                <td>" . htmlspecialchars($Fila['IdDomicilio']) . "</td>
              </tr>";
    }

    echo "</tbody>
            </table>
            <p class='registros'>Registros encontrados: " . $N . "</p>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>