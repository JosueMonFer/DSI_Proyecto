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
    <title>Panel Administrador</title>
    <link rel="stylesheet" href="styles/admin.css"> <!-- Tu CSS opcional -->
</head>
<body>
    <h1>Bienvenido, administrador <?php echo $_SESSION['username']; ?></h1>

    <nav>
        <ul>
            <li><a href="SELECT/consultar.php">Consultar vehículos</a></li>
            <li><a href="INSERT/insertar.php">Registrar nuevo vehículo</a></li>
            <li><a href="UPDATE/actualizar.php">Actualizar información</a></li>
            <li><a href="DELETE/eliminar.php">Eliminar vehículo</a></li>
        </ul>
    </nav>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
