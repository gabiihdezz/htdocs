    <?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('util/login.php'); 
require_once('util/funciones.php');  

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
  
    if (pasarHash($contra)) {
        $_SESSION["contra"] = $contra;
        header("Location: inicio.php");  
        exit();
    }
    if (autenticarUsuario($usuario, $contra)) {
        $_SESSION["usuario"] = $usuario;
        $_SESSION["contra"] = $contra;
        header("Location: inicio.php");  
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
    <h2>Iniciar sesión</h2>
    <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>

    <form method="post" action="">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="contra">Contraseña:</label>
        <input type="password" id="contra" name="contra" required><br>

        <input type="submit" value="Entrar">
    </form>
    <hr>
    <h3>¿No tienes cuenta?</h3>
    <a href="portfolio/signup.php">Registrarse</a>


</body>
</html>
