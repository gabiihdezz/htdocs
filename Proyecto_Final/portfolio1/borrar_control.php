<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $sql = "DELETE FROM controles WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: menu_control.php');
        echo "✅ Control eliminado correctamente.";
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>

<h2>Eliminar Control Médico</h2>
<form method="POST" action="">
    <label>ID del Control a eliminar:</label>
    <input type="number" name="id" required><br>

    <input type="submit" value="Eliminar Control">
</form>
