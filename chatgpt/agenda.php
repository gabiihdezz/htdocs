<?php
session_start();
if (!isset($_SESSION['usuario']) || !isset($_SESSION['contador'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda</title>
</head>
<body>
    <h1>Hola, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
    <form method="POST" action="grabado.php">
        <?php
        for ($i = 1; $i <= $_SESSION['contador']; $i++) {
            echo <<<HTML
                <fieldset>
                    <legend>Contacto $i</legend>
                    <label>Nombre:</label>
                    <input type="text" name="nobrem$i" required>
                    <br>
                    <label>Email:</label>
                    <input type="email" name="email$i" required>
                    <br>
                    <label>Teléfono:</label>
                    <input type="tel" name="telefono$i" required>
                </fieldset>
                <br>
HTML;
        }
        ?>
        <button type="submit">Grabar</button>
    </form>
</body>
</html>
