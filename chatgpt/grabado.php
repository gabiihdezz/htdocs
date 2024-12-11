<?php
session_start();
require_once('conexion.php');

// Verificar si el usuario está logueado
if (!isset($_SESSION['codusuario'])) {
    echo "No has iniciado sesión.";
    exit();
}

$codusuario = $_SESSION['codusuario'];  
$contador = $_SESSION['contador'];     

for ($i = 1; $i <= $contador; $i++) {
    $nombre = htmlspecialchars($_POST["nombre$i"]);
    $email = htmlspecialchars($_POST["email$i"]);
    $telefono = htmlspecialchars($_POST["telefono$i"]);

    $query = "INSERT INTO contactos (nombre, email, telefono, codusuario) VALUES ($nombre, $email, $telefono, $i)";
    }

$conn->close();

echo "Contactos insertados correctamente.";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contactos Grabados</title>
</head>
<body>
    <h1>Contactos Grabados</h1>
    <p>Se han grabado <?php echo $contador; ?> contactos.</p>
    <a href="inicio.php">Volver al inicio</a>
    <a href="totales.php">Ver totales</a>
</body>
</html>
