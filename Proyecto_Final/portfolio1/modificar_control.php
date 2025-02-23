<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM controles WHERE id = $id");
    $control = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $glucosa = $_POST["glucosa"];
    $presion = $_POST["presion"];
    $observaciones = $_POST["observaciones"];

    $sql = "UPDATE controles SET glucosa='$glucosa', presion='$presion', observaciones='$observaciones' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header('Location: menu_control.php');
        exit(); // Detener la ejecución después de la redirección
    } else {
        echo "❌ Error: " . $conn->error;
    }
}

$conn->close();
?>

<h2>Modificar Control Médico</h2>
<form method="POST">
    <label>Glucosa:</label>
    <input type="number" name="glucosa" value="<?php echo $control['glucosa']; ?>" required><br>

    <label>Presión:</label>
    <input type="text" name="presion" value="<?php echo $control['presion']; ?>" required><br>

    <label>Observaciones:</label>
    <textarea name="observaciones"><?php echo $control['observaciones']; ?></textarea><br>

    <input type="submit" value="Modificar Control">
    <a href="index.php">Volver</a>
</form>
