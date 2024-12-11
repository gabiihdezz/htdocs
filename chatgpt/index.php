<?php
session_start();
require_once('conexion.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = htmlspecialchars($_POST['usuario']);
    $clave = htmlspecialchars($_POST['clave']);

    // Consulta para validar usuario
    $query = "SELECT * FROM usuarios WHERE Nombre = ? AND Clave = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $usuario, $clave);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $_SESSION['usuario'] = $row['Nombre'];
        $_SESSION['codusuario'] = $row['Codigo'];
        header("Location: inicio.php"); 
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>
    <form method="POST">
        <label>Usuario:</label>
        <input type="text" name="usuario" required>
        <br>
        <label>Clave:</label>
        <input type="password" name="clave" required>
        <br>
        <button type="submit">Entrar</button>
    </form>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
</body>
</html>
