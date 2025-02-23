<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $diagnostico = $_POST['diagnostico'];

    $sql = "INSERT INTO pacientes (nombre, edad, diagnostico) VALUES ('$nombre', '$edad', '$diagnostico')";
    if ($conn->query($sql) === TRUE) {
        echo "Paciente añadido correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Nombre: <input type="text" name="nombre" required><br>
    Edad: <input type="number" name="edad" required><br>
    Diagnóstico: <input type="text" name="diagnostico" required><br>
    <input type="submit" value="Añadir">
    <a href="index.php">Volver</a>
</form>
