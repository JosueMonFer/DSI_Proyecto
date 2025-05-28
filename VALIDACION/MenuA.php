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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panel de Control - Administración Vehicular</title>
    <link rel="stylesheet" href="../styles/SMenus.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
</head>

<body>
    <div class="encabezado">
    <div class="contenidoEncabezado">
        <h1 class="titulo">ADMINISTRADOR DE CONTROL VEHICULAR</h1>
        <div class="usuario">
            <span class="bienvenida">Bienvenido, administrador <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong></span>
            <a href="logout.php" class="logout">Cerrar sesión</a>
        </div>
    </div>
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
                        <li><a href="../SELECT/FSCentrosVerificacion.html"><i class="fas fa-building iconoSubmenu"></i>Centros Verificación</a></li>
                        <li><a href="../SELECT/FSConductores.html"><i class="fas fa-user iconoSubmenu"></i>Conductores</a></li>
                        <li><a href="../SELECT/FSDomicilios.html"><i class="fas fa-house-user iconoSubmenu"></i>Domicilios</a></li>
                        <li><a href="../SELECT/FSLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../SELECT/FSMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../SELECT/FSOficiales.html"><i class="fas fa-badge iconoSubmenu"></i>Oficiales</a></li>
                        <li><a href="../SELECT/FSPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../SELECT/FSPropietarios.html"><i class="fas fa-id-badge iconoSubmenu"></i>Propietarios</a></li>
                        <li><a href="../SELECT/FSTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../SELECT/FSTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                        <li><a href="../SELECT/FSVehiculos.html"><i class="fas fa-car iconoSubmenu"></i>Vehículos</a></li>
                    </ul>
                </li>
                <!-- Consultas -->
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-plus-circle iconoMenu"></i>
                        Registros
                    </a>
                    <ul class="submenu">
                        <li><a href="../INSERT/FCentrosVerificacion.html"><i class="fas fa-building iconoSubmenu"></i>Centros Verificación</a></li>
                        <li><a href="../INSERT/FConductores.html"><i class="fas fa-user iconoSubmenu"></i>Conductores</a></li>
                        <li><a href="../INSERT/FDomicilios.html"><i class="fas fa-house-user iconoSubmenu"></i>Domicilios</a></li>
                        <li><a href="../INSERT/FLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../INSERT/FMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../INSERT/FOficiales.html"><i class="fas fa-badge iconoSubmenu"></i>Oficiales</a></li>
                        <li><a href="../INSERT/FPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../INSERT/FPropietarios.html"><i class="fas fa-id-badge iconoSubmenu"></i>Propietarios</a></li>
                        <li><a href="../INSERT/FTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../INSERT/FTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                        <li><a href="../INSERT/FVehiculos.html"><i class="fas fa-car iconoSubmenu"></i>Vehículos</a></li>
                    </ul>
                </li>

                                <!-- Actualizaciones -->
                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-edit iconoMenu"></i>
                        Actualizaciones
                    </a>
                    <ul class="submenu">
                        <li><a href="../UPDATE/BUCentrosVerificacion.html"><i class="fas fa-building iconoSubmenu"></i>Centros Verificación</a></li>
                        <li><a href="../UPDATE/BUConductores.html"><i class="fas fa-user iconoSubmenu"></i>Conductores</a></li>
                        <li><a href="../UPDATE/BUDomicilios.html"><i class="fas fa-house-user iconoSubmenu"></i>Domicilios</a></li>
                        <li><a href="../UPDATE/BULicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../UPDATE/BUMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../UPDATE/BUOficiales.html"><i class="fas fa-badge iconoSubmenu"></i>Oficiales</a></li>
                        <li><a href="../UPDATE/BUPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../UPDATE/BUPropietarios.html"><i class="fas fa-id-badge iconoSubmenu"></i>Propietarios</a></li>
                        <li><a href="../UPDATE/BUTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../UPDATE/BUTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                        <li><a href="../UPDATE/BUVehiculos.html"><i class="fas fa-car iconoSubmenu"></i>Vehículos</a></li>
                    </ul>
                </li>

                <li class="seccion">
                    <a class="enlaceSeccion">
                        <i class="fas fa-trash-alt iconoMenu"></i>
                        Eliminaciones
                    </a>
                    <ul class="submenu">
                        <li><a href="../DELETE/FDCentrosVerificacion.html"><i class="fas fa-building iconoSubmenu"></i>Centros Verificación</a></li>
                        <li><a href="../DELETE/FDConductores.html"><i class="fas fa-user iconoSubmenu"></i>Conductores</a></li>
                        <li><a href="../DELETE/FDDomicilios.html"><i class="fas fa-house-user iconoSubmenu"></i>Domicilios</a></li>
                        <li><a href="../DELETE/FDLicencias.html"><i class="fas fa-id-card iconoSubmenu"></i>Licencias</a></li>
                        <li><a href="../DELETE/FDMultas.html"><i class="fas fa-exclamation-triangle iconoSubmenu"></i>Multas</a></li>
                        <li><a href="../DELETE/FDOficiales.html"><i class="fas fa-badge iconoSubmenu"></i>Oficiales</a></li>
                        <li><a href="../DELETE/FDPagos.html"><i class="fas fa-credit-card iconoSubmenu"></i>Pagos</a></li>
                        <li><a href="../DELETE/FDPropietarios.html"><i class="fas fa-id-badge iconoSubmenu"></i>Propietarios</a></li>
                        <li><a href="../DELETE/FDTarjetasCirculacion.html"><i class="fas fa-car-side iconoSubmenu"></i>Tarjetas Circulación</a></li>
                        <li><a href="../DELETE/FDTarjetasVerificacion.html"><i class="fas fa-check-circle iconoSubmenu"></i>Tarjetas Verificación</a></li>
                        <li><a href="../DELETE/FDVehiculos.html"><i class="fas fa-car iconoSubmenu"></i>Vehículos</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</body>
</html>
