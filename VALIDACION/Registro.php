<?php
$conexion = new mysqli("localhost", "root", "", "controlvehicular31");

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$key = $_POST['key'];
$rol = $_POST['rol'];

$sql = "INSERT INTO usuarios (username, password, key, rol)
        VALUES ('$username', '$password', '$key', '$rol')";

if ($conexion->query($sql)) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
