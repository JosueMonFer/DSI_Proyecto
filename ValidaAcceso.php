<?php
    $Username=$_POST['Username'];
    $Password=$_POST['Password'];
    $Intentos=0;

    $SQL = "SELECT * FROM Usuarios WHERE Username = '$Username';";

    include("controlador.php");

    $Conexion = Conectar();
    $ResultSet = Ejecutar($Conexion, $SQL);
    $Fila = mysqli_fetch_row($ResultSet);
    $N = mysqli_num_rows($ResultSet);
    if($N == 0){
        print("Usuario no existe<br>");
    } else {
        print("Usuario existe<br>");
        if($Fila[1]==$Password){
            print("Contraseña correcta<br>");
        } else {
            print("Contraseña incorrecta<br>");
            print("Acceso Denegado");
            $Intentos = $Fila[5] + 1;
            $SQL = "UPDATE Usuarios SET INTENTOS = $Intentos WHERE USERNAME = '$Username';";
            Ejecutar($Conexion,$SQL);
            if($Intentos == 3){
                $SQL = "UPDATE Usuarios SET BLOQUEO = 1 WHERE USERNAME = '$Username';";
                Ejecutar($Conexion,$SQL);
            }
            exit;
        }
        
        if($Fila[2]=="A"){
            print("Eres Administrador<br>");
        } else {
            print("Eres Usuario<br>");
        }
        if($Fila[3]==1){
            print("Eres Activo<br>");
        } else {
            print("Eres Inactivo<br>");
        }
        if($Fila[4]==0){
            print("No estas bloqueado<br>");
        } else {
            print("Estas bloqueado<br>");
            exit;

        }
        if($Fila[2]=="A"){
            header("Location: MENUS/MenuA.html");
        } else {
            header("Location: MENUS/MenuU.html");
        }
    }
    Desconectar($Conexion);
?>