<?php
session_start();
$conexion = new mysqli("localhost", "root", "", "controlvehicular31");

$username = $_POST['username'];
$password = $_POST['password'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM usuarios WHERE username = '$username' AND clave_acceso = '$clave'";
$result = $conexion->query($sql);

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if (password_verify($password, $usuario['password'])) {
        $_SESSION['username'] = $username;
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] === 'admin') {
            header("Location: MenuA.php");
        } else {
            header("Location: MenuB.php");
        }
        exit();
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "Usuario o clave incorrectos.";
}

$conexion->close();
?>
