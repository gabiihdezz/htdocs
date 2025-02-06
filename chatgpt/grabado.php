<?php
session_start();
require_once('conexion.php');

if (!isset($_SESSION['codusuario'])) {
    echo "No has iniciado sesión.";
    exit();
}

$codusuario = $_SESSION['codusuario'];  
$contador = $_SESSION['contador'];     

$usuarios = [
    'luis' => 1,
    'maria' => 2,
    'paco' => 3,
    'pedro' => 4,
];

$codcontacto = $usuarios[$_SESSION['usuario']] ?? 33;


for ($i = 1; $i <= $contador; $i++) {
    $nombre = isset($_POST["nombre$i"]) ? htmlspecialchars($_POST["nombre$i"]) : '';
    $email = isset($_POST["email$i"]) ? htmlspecialchars($_POST["email$i"]) : '';
    $telefono = isset($_POST["telefono$i"]) ? htmlspecialchars($_POST["telefono$i"]) : '';
    $query = "INSERT INTO contactos (nombre, email, telefono, codcontacto) VALUES ($nombre, $email, $telefono, $codcontacto)";
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
