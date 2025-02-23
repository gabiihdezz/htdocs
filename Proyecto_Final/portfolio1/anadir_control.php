<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paciente_id = $_POST["paciente_id"];
    $fecha = $_POST["fecha"];
    $glucosa = $_POST["glucosa"];
    $presion = $_POST["presion"];
    $observaciones = $_POST["observaciones"];

    $sql = "INSERT INTO controles (paciente_id, fecha, glucosa, presion, observaciones) 
            VALUES ('$paciente_id', '$fecha', '$glucosa', '$presion', '$observaciones')";

    if ($conn->query($sql) === TRUE) {
        header('Location: menu_control.php');
        echo "Control añadido correctamente.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<form method="POST" action="">
    <label>Paciente ID:</label>
    <input type="number" name="paciente_id" required><br>

    <label>Fecha:</label>
    <input type="date" name="fecha" required><br>

    <label>Glucosa:</label>
    <input type="number" name="glucosa" required><br>

    <label>Presión:</label>
    <input type="text" name="presion" required><br>

    <label>Observaciones:</label>
    <textarea name="observaciones"></textarea><br>

    <input type="submit" value="Añadir Control">
</form>
