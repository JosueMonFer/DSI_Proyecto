<?php
session_start();
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

    // Buscar usuario por username
    $stmt = $conexion->prepare("SELECT password, rol FROM usuarios WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($hash_db, $rol_db);
        $stmt->fetch();

        // Verificar contraseña
        if (password_verify($password, $hash_db)) {
            // Verificar que la key coincide con el rol
            if (($key === "adminkey123" && $rol_db === "admin") || ($key === "userkey123" && $rol_db === "usuario")) {
                // Login exitoso
                $_SESSION['username'] = $username;
                $_SESSION['rol'] = $rol_db;

                if ($rol_db === "admin") {
                    header("Location: MenuA.php");  // Cambia por tu página admin
                } else {
                    header("Location: MenuU.php");  // Cambia por tu página usuario
                }
                exit;
            } else {
                echo "Key incorrecta para el rol.";
            }
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
}
$conexion->close();
?>

