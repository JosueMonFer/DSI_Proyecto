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
    <title>Panel Usuario</title>
    <link rel="stylesheet" href="styles/usuario.css"> <!-- Tu CSS opcional -->
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1>

    <nav>
        <ul>
            <li><a href="SELECT/consultar.php">Consultar vehículos</a></li>
        </ul>
    </nav>

    <p><a href="logout.php">Cerrar sesión</a></p>
</body>
</html>
