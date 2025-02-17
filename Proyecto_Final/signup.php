<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('util/login.php'); 
require_once('util/funciones.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $contra = $_POST["contra"];
    $correo = $_POST["correo"];
    $user = $_POST["user"];
    $fecha = $_POST["fecha"];
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $contra2 = $_POST["contra2"];

    if (registroUsuario($contra, $correo , $user, $fecha, $nombre, $apellidos)) {
        $_SESSION["usuario"] = $usuario;
        header("Location: inicio.php");  
        exit();
    } else {
        $error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }


    if ($contra === $contra2) {
        header("Location: inicio.php");  
        exit();
    } else {
        $error = "Las contraseñas no coinciden. Inténtalo de nuevo.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <style>
        *{
            text-align:center;
            background-color: black;
            color:white;
            font-size: 30px;
            margin:10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

    </style>
</head>
<body>
    <h2 href="signup.php">Registrarse</h2>

    <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

    <form method="post" action="">

        <label for="nombre">Nombre: </label>
        <input type="text" id="nombre" name="nombre" required><br>

        <label for="apellidos">Apellidos: </label>
        <input type="text" id="apellidos" name="apellidos" required><br>

        <label for="correo">Correo Electrónico: </label>
        <input type="text" id="correo" name="correo" required><br>
        
        <label for="fecha">Fecha de Nacimiento: </label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="user">Usuario: </label>
        <input type="text" id="user" name="user" required><br>

        <label for="contra">Contraseña: </label>
        <input type="password" id="contra" name="contra" required><br>

        <label for="contra2">Repetir contraseña: </label>
        <input type="password" id="contra2" name="contra2" required><br>

        <input type="submit" value="Registrarse">
    </form>
    <hr>
    <h4>¿Ya tienes una cuenta?</h4>
        <a href="login.php">Iniciar Sesión</a>
</body>
</html>
