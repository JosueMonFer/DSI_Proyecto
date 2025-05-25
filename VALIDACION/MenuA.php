<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'admin') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Administración Vehicular</title>
    <link rel="stylesheet" href="../styles/SMenus.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="encabezado">
        <h1 class="titulo">ADMINISTRADOR DE CONTROL VEHICULAR</h1>
        <p style="text-align:center;">Bienvenido, administrador <?php echo $_SESSION['username']; ?> | <a href="../logout.php">Cerrar sesión</a></p>
    </div>

    <div class="contenedor">
        <nav class="menu">
            <ul class="lista">
                <!-- Consultas -->
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-search iconoMenu"></i>
                        Consultas
                    </a>
                    <ul class="submenu">
                        <li><a href="../SELECT/FSLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../SELECT/FSMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../SELECT/FSPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../SELECT/FSTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../SELECT/FSTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                    </ul>
                </li>

                <!-- Registros -->
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-plus-circle iconoMenu"></i>
                        Registros
                    </a>
                    <ul class="submenu">
                        <li><a href="../INSERT/FLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../INSERT/FMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../INSERT/FPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../INSERT/FTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../INSERT/FTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                    </ul>
                </li>

                <!-- Actualizaciones -->
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-edit iconoMenu"></i>
                        Actualizaciones
                    </a>
                    <ul class="submenu">
                        <li><a href="../UPDATE/FULicencias.php"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../UPDATE/FUMultas.php"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../UPDATE/FUPagos.php"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../UPDATE/FUTarjetasCirculacion.php"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../UPDATE/FUTarjetasVerificacion.php"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                    </ul>
                </li>

                <!-- Eliminaciones -->
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-trash-alt iconoMenu"></i>
                        Eliminaciones
                    </a>
                    <ul class="submenu">
                        <li><a href="../DELETE/FDLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../DELETE/FDMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../DELETE/FDPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../DELETE/FDTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../DELETE/FDTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
