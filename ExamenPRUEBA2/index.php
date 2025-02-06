<?php
session_start();
require_once('conexion.php'); 
require_once('funciones.php'); 
<<<<<<< HEAD
=======
$_SESSION['codusuario'] = htmlspecialchars($result->fetch_assoc()['Codigo']);
>>>>>>> 8be80c137861cac082f5a1f16cbf7dd413a6a04c

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $clave = $_POST["clave"];

    if (autenticarUsuario($nombre, $clave)) {
        $_SESSION["nombre"] = $nombre;
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
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        h1 {
            font-size: 24px;
        }
        .container {
            display: inline-block;
            border: 2px solid #000;
            padding: 5px;
            background-color: #ffffff;
        }
        table {
            border-collapse: collapse;
        }
        td {
            padding: 5px;
        }
        input[type="text"], input[type="password"] {
            width: 150px;
            padding: 4px;
            border: 1px solid #000;
        }
        input[type="submit"] {
            padding: 5px 10px;
            border: 1px solid #000;
            background-color: #f0f0f0;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #e0e0e0;
        }
    </style>
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
    <div class="container">
        <?php if(isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
        <form action="" method="post">
            <table>
                <tr>
                    <td>Usuario:</td>
                    <td><input type="text" id="nombre" name="nombre" required></td>
                    <td>Clave:</td>
                    <td><input type="password" id="clave" name="clave" required></td>
                    <td><input type="submit" value="Entrar"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>
