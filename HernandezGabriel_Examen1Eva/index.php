<?php
session_start();
require_once('util/login.php'); 
require_once('util/funciones.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST["login"];
    $clave = $_POST["clave"];

    if (autenticarUsuario($login, $clave)) {
        $_SESSION["login"] = $login;
        header(header: "Location: inicio.php");  
        exit();
    } else {
        $error = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>
    <h2>Iniciar sesión</h2>
    <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

    <form method="post" action="">
        <label for="login">Usuario:</label>
        <input type="text" id="login" name="login" required><br>

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" required><br>

        <input type="submit" value="Entrar">
    </form>
</body>
</html>
