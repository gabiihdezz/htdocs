<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM pacientes WHERE id = $id");
    $paciente = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $diagnostico = $_POST['diagnostico'];

    $sql = "UPDATE pacientes SET nombre='$nombre', edad='$edad', diagnostico='$diagnostico' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header ('Location: index.php');
        echo "Paciente modificado correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<form method="POST">
    Nombre: <input type="text" name="nombre" value="<?php echo $paciente['nombre']; ?>" required><br>
    Edad: <input type="number" name="edad" value="<?php echo $paciente['edad']; ?>" required><br>
    Diagnóstico: <input type="text" name="diagnostico" value="<?php echo $paciente['diagnostico']; ?>" required><br>
    <input type="submit" value="Modificar">
    <a href="index.php">Volver</a>

</form>
