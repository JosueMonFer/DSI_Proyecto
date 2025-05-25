<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['rol'] !== 'usuario') {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario - Control Vehicular</title>
    <link rel="stylesheet" href="../styles/SMenus.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="encabezado">
        <h1 class="titulo">BIENVENIDO, <?php echo $_SESSION['username']; ?> - CONTROL VEHICULAR</h1>
    </div>

    <div class="contenedor">
        <nav class="menu">
            <ul class="lista">
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-search iconoMenu"></i>
                        Consultas
                    </a>
                    <ul class="submenu">
                        <li><a href="../SELECT/FSLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../SELECT/FSTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../SELECT/FSMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../SELECT/FSTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                        <li><a href="../SELECT/FSPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

    <div style="text-align: center; margin-top: 20px;">
        <a href="logout.php" style="font-weight: bold;">Cerrar sesión</a>
    </div>
</body>

</html>

