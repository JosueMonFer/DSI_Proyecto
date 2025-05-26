<?php
    // Obtener datos del Frontend
    $Criterio = $_REQUEST['Criterio'];
    $Atributo = $_REQUEST['Atributo'];

    // Crear instrucción SQL
    $SQL = "SELECT * FROM Oficiales WHERE $Atributo LIKE '%$Criterio%'";

    // Enviar la instrucción al SMBD
    include("../controlador.php");
    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);

    $N = mysqli_num_rows($ResultSet);

    if (isset($_GET['generar_csv'])) {
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="Oficiales.csv"');
        
        $output = fopen('php://output', 'w');
        
        fputcsv($output, ['IdOficial', 'Cargo', 'Nombre', 'Apellido']);
        
        while ($Fila = $ResultSet->fetch_assoc()) {
            fputcsv($output, $Fila);
        }
        
        fputcsv($output, ['Total de registros:', $N]);
        fputcsv($output, ['']);
        fputcsv($output, ['Informacion del Sistema', '']);
        fputcsv($output, ['Servidor BD:', 'localhost']);
        fputcsv($output, ['Usuario BD:', 'root']);
        fputcsv($output, ['Nombre BD:', 'controlvehicular31']);
        fclose($output);
        exit();
    }

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
            <h2><i class='fas fa-user-shield'></i> Resultados de Oficiales</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID Oficial</th>
                        <th>Cargo</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                    </tr>
                </thead>
                <tbody>";

    while ($Fila = $ResultSet->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($Fila['IdOficial']) . "</td>
                <td>" . htmlspecialchars($Fila['Cargo']) . "</td>
                <td>" . htmlspecialchars($Fila['Nombre']) . "</td>
                <td>" . htmlspecialchars($Fila['Apellido']) . "</td>
              </tr>";
    }

    echo "</tbody>
            </table>
            <div class='acciones'>
                <p class='registros'>Registros encontrados: " . $N . "</p>
                <a href='?Criterio=" . urlencode($Criterio) . "&Atributo=" . urlencode($Atributo) . "&generar_csv=1' class='exportar'>
                    <i class='fas fa-file-csv'></i> Exportar a CSV
                </a>
            </div>
        </div>";

    Desconectar($Conexion);

    echo "</body>
    </html>";
?>