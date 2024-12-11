<?php
session_start();

// Verificar si el 'codusuario' está definido en la sesión
if (!isset($_SESSION['codusuario'])) {
    echo "Error: La variable 'codusuario' no está definida en la sesión.";
    exit;
}

// Conexión a la base de datos
require_once 'conexion.php';
$conn = new mysqli('localhost', 'root', '', 'pruebas', 3307);
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

// Verificar el número de contactos grabados
$codusuario = $_SESSION['codusuario'];
$query = "SELECT COUNT(*) as num_contactos FROM contactos WHERE codusuario = '$codusuario'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $num_contactos = $row['num_contactos'];
} else {
    $num_contactos = 0;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Grabado de Contactos</title>
    <style>
        body {
            text-align: center;
            background-color: aliceblue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        a {
            text-decoration: none;
            color: #0066cc;
            font-size: 18px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Contactos grabados correctamente</h1>
    <p>Se han grabado <?php echo $num_contactos; ?> contactos en la agenda.</p>

    <p>
        <a href="agenda.php">Volver a la gestión de contactos</a><br>
        <a href="listado.php">Ver lista de contactos</a><br>
        <a href="logout.php">Cerrar sesión</a>
    </p>
</body>
</html>
