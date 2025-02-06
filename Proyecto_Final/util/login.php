<?php

// Crear conexión
$conn = new mysqli('localhost', 'root', '', 'diabetesdb', 3307);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
