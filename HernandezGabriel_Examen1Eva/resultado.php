<?php
session_start();
require_once('util/login.php');
if (!isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}


$query = "
    SELECT jugador.login, hora AS hora, respuestas.fecha = '2024-12-12'
    FROM jugador 
    LEFT JOIN respuestas ON jugador.login = respuestas.login 
    GROUP BY respuestas.hora
";



$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de dia</title>
</head>
<body>
    <h1>Resultados del dia 2024-12-12</h1>
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Hora</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['login']); ?></td>
                <td><?php echo htmlspecialchars($row['hora']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="inicio.php">Volver al inicio</a>
</body>
</html>
