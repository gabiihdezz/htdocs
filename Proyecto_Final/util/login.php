<<<<<<< HEAD
<?php

// Crear conexión
$conn = new mysqli('localhost', 'root', '', 'diabetesdb', 3307);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
=======
<?php

// Crear conexión
$conn = new mysqli('localhost', 'root', '', 'diabetesdb', 3307);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
>>>>>>> 8be80c137861cac082f5a1f16cbf7dd413a6a04c
