<?php
$conn = new mysqli('localhost', 'root', '', 'niabetes', 3307);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
echo "Conexión exitosa!";
?>
