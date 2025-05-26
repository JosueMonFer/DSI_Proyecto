<?php
$conexion = new mysqli("localhost", "root", "", "controlvehicular31");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $key = trim($_POST['key']);

    if (empty($username) || empty($password) || empty($key)) {
        echo "Por favor complete todos los campos.";
        exit;
    }

    // Determinar rol basado en la clave
    if ($key === "adminkey123") {
        $rol = "admin";
    } elseif ($key === "userkey123") {
        $rol = "usuario";
    } else {
        echo "Clave inválida.";
        exit;
    }

    // Verificar que el usuario no exista
    $stmt = $conexion->prepare("SELECT id FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "El nombre de usuario ya está registrado.";
        exit;
    }

    $stmt->close();

    // Insertar usuario
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conexion->prepare("INSERT INTO usuarios (username, password, rol) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hash, $rol);

    if ($stmt->execute()) {
        echo "Usuario registrado exitosamente como $rol.";
        // Opcional: redirigir al login
        // header("Location: login.html");
    } else {
        echo "Error al registrar usuario.";
    }

    $stmt->close();
}
$conexion->close();
?>
