<?php
$conexion = new mysqli("localhost", "root", "", "controlvehicular31");

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

$mostrar_check = false;
$mensaje_exito = "";

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
        $mostrar_check = true;
        $mensaje_exito = "Usuario registrado exitosamente como $rol.";
    } else {
        echo "Error al registrar usuario.";
    }

    $stmt->close();
}
$conexion->close();

if ($mostrar_check) {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario Registrado</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #1e2a5a 0%, #2d4cb8 50%, #1a2752 100%);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }

        .success-container {
            text-align: center;
            color: white;
        }

        .check-circle {
            width: 120px;
            height: 120px;
            border: 5px solid #22c55e;
            border-radius: 50%;
            margin: 0 auto 30px;
            position: relative;
            animation: checkCircle 0.8s ease-out;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes checkCircle {
            0% {
                transform: scale(0);
                opacity: 0;
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .check-mark {
            font-size: 60px;
            color: #22c55e;
            font-weight: bold;
            animation: checkAppear 0.5s ease-in-out 0.8s forwards;
            opacity: 0;
        }

        @keyframes checkAppear {
            0% {
                opacity: 0;
                transform: scale(0);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .success-text {
            font-size: 24px;
            font-weight: 600;
            margin-top: 20px;
            animation: fadeIn 0.5s ease-in-out 1s both;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="check-circle">
            <div class="check-mark">✓</div>
        </div>
        <div class="success-text"><?php echo $mensaje_exito; ?></div>
    </div>

    <script>
        // Redirigir a login.html después de que termine la animación
        setTimeout(function() {
            window.location.href = 'login.html';
        }, 2000); // 2 segundos (tiempo total de las animaciones + un poco más)
    </script>
</body>
</html>
<?php
}
?>
