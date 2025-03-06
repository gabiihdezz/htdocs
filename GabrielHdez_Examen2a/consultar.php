<?php
session_start();
require('portfolio/funciones.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = trim($_POST["fecha"]);
    $idpersona = $_POST["idpersona"];

    // Llamar a la función para guardar en la base de datos
}
$query_control = "SELECT * FROM agenda WHERE idpersona = ? AND fecha = ?";

$stmt_control = $conn->prepare($query_control);
$stmt_control->bind_param("is", $idpersona, $fecha);
$stmt_control->execute();
$result_control = $stmt_control->get_result();
$stmt_control->free_result();

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ver Agenda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;

        }
        img{
            width:140px;
            height: auto;
        }
        table,tr{
            margin: 3px;
            border:1px solid black;
        }
    </style>
</head>
<body class="container">
<div>Ver Agenda</div>
<form method="POST" action="">
    <label for="fecha" required>Fecha:</label>
    <input type="date" name="fecha"><br>
        <br>
        <label for="idpersona">persona:</label>
        <select  id="idpersona" name="idpersona" required>
            <option value="">Selecciona una opción</option>
            <option value="1">Carlos</option>
            <option value="2">Juan</option>
            <option value="3">Manuel</option>
        </select><br>
        <br>
    <br>

    <input type="submit" value="Mostrar Agenda">
    <a href="index.php">Volver al inicio</a>
    <a href="anadir.php">Añadir</a>
</form>

<table>
    <?php while ($row = $result_control->fetch_assoc()): ?>
                <tr>
                    <th>FECHA:<?= htmlspecialchars($row['fecha']) ?> ||</th>
                    <th>ID de la IMAGEN: <?= htmlspecialchars($row['idimagen']) ?>||</th>
                    <th>HORA: <?= htmlspecialchars($row['hora']) ?></th>
                </tr>
            <?php endwhile; ?>
            </table>
</body>
</html>