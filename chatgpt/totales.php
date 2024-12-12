<?php
session_start();
require_once('conexion.php');
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

$query = "
    SELECT usuarios.Nombre, COUNT(contactos.codcontacto) AS total_contactos 
    FROM usuarios 
    LEFT JOIN contactos ON usuarios.Codigo = contactos.codusuario 
    GROUP BY usuarios.Nombre
";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Totales de Contactos</title>
</head>
<body>
    <h1>Totales de Contactos</h1>
    <table border="1">
        <tr>
            <th>Usuario</th>
            <th>Total Contactos</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['Nombre']); ?></td>
                <td><?php echo htmlspecialchars($row['total_contactos']); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <a href="inicio.php">Volver al inicio</a>
</body>
</html>
