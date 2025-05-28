<?php
    if (isset($_GET['IdPropietario']) && isset($_GET['Nombre']) && isset($_GET['Apellido']) && isset($_GET['AnioNacimiento']) && isset($_GET['IdVehiculo'])) {
    $IdPropietario=$_GET['IdPropietario'];
    $Nombre=$_GET['Nombre'];
    $Apellido=$_GET['Apellido'];
    $AnioNacimiento=$_GET['AnioNacimiento'];
    $IdVehiculo=$_GET['IdVehiculo'];

    //Pasar a formar instrucciones SQL
    $SQL="UPDATE Propietarios SET Nombre='$Nombre', Apellido='$Apellido', AnioNacimiento='$AnioNacimiento', IdVehiculo='$IdVehiculo' WHERE IdPropietario='$IdPropietario'";
    
    include("../controlador.php"); 

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);
    
    $NumRows = mysqli_affected_rows($Conexion);
    Desconectar($Conexion);

    if ($NumRows == 1) {
        $mensaje = "1 Registro actualizado";
    } else {
        $mensaje = "0 Registros actualizados: " . (isset($Conexion->error) ? $Conexion->error : "Error desconocido");
    }

} else {
    $mensaje = "Error: Faltan parámetros requeridos";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Resultado de actualización</title>
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
            font-family: Arial, sans-serif;
        }
        .message {
            font-size: 18px;
            margin-bottom: 20px;
        }
        .btn-regresar {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-regresar:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="message"><?php echo htmlspecialchars($mensaje); ?></p>
        <button class="btn-regresar" onclick="window.history.back();">Regresar</button>
    </div>
</body>
</html>