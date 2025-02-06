<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('util/usuario.php'); 
require_once('util/funciones.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $clave = $_POST["clave"];

    if (autenticarUsuario($clave, $clave2)) {
        $_SESSION["usuario"] = $usuario;
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
    <title>Iniciar sesión</title>
    <style>
        *{
            text-align:center;
            font-size: 30px;
            margin:10px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

    </style>
</head>
<body>
    <h2 href="registro.php">Registrarse</h2>

    <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

    <form method="post" action="">
        <label for="correo">Correo Electrónico: </label>
        <input type="text" id="correo" name="correo" required><br>
        
        <label for="fecha">Fecha de Nacimiento: </label>
        <input type="date" id="fecha" name="fecha" required><br>

        <label for="user">Usuario: </label>
        <input type="text" id="user" name="user" required><br>

        <label for="clave">Contraseña: </label>
        <input type="password" id="clave" name="clave" required><br>

        <label for="clave2">Repetir contraseña: </label>
        <input type="password" id="clave2" name="clave2" required><br>


        <input type="submit" value="Registrarse">
    </form>

</body>
</html>
