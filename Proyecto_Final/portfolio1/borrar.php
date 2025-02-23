<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM pacientes WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        header ('Location: index.php');
        echo "Paciente eliminado correctamente";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
