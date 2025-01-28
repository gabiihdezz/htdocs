<?php
session_start();
require_once('util/login.php');
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}


$query = "
    SELECT jugador.login, puntos AS puntos
    FROM jugador 
    LEFT JOIN respuestas ON jugador.login = respuestas.login 
    GROUP BY jugador.login
";



$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Puntos por Jugador</title>
   
</head>
<body>
    <h1>Puntos por Jugador</h1>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Puntos</th>
            <th>Gráfica %</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['login']); ?></td>
                <td><?php echo htmlspecialchars($row['puntos']); ?></td>
                <td style=" background-color: red; width: <?php $row['puntos'] ?> % ;"><?php  ;echo htmlspecialchars($row['puntos']*100/200); ?> %</td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="inicio.php">Volver al inicio</a>
</body>
</html>
