<?php
session_start();

// Verifica si el usuario está autenticado
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

// Inicia el contador si no está definido
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Reinicia el contador a 0 cuando se recarga o reinicia el código
if ($_SESSION['contador'] >= 5) {
    $_SESSION['contador'] = 0; // Resetear cuando el contador llega a 5
    // Aquí puedes hacer lo que quieras, como redirigir a la agenda.php si deseas
    // header("Location: agenda.php");
    // exit();
}

// Incrementar el contador solo cuando se presiona el botón
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['incrementar'])) {
    $_SESSION['contador']++;
    if ($_SESSION['contador'] > 5) {
        $_SESSION['contador'] = 5; // Limitar a 5
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
</head>
<body>
    <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h1>
    <p>Contactos seleccionados: <?php echo $_SESSION['contador']; ?></p>
    
    <!-- Botón para incrementar el contador -->
    <form method="POST">
        <button name="incrementar" type="submit" <?php echo ($_SESSION['contador'] >= 5) ? 'disabled' : ''; ?>>Incrementar</button>
    </form>
    
    <!-- Formulario para agregar contactos -->
    <form action="agenda.php" method="POST">
        <button type="submit" name="grabar">GRABAR</button>
    </form>

    <?php
    // Mostrar emoticonos según el contador
    for ($i = 0; $i < $_SESSION['contador']; $i++) {
        echo "😀 ";
    }
    ?>
</body>
</html>
