<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pruebas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname, 3307);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
