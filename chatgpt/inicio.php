<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

if ($_SESSION['contador'] >= 5) {
    header("Location: grabado.php");
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['incrementar'])) {
    $_SESSION['contador']++;
    if ($_SESSION['contador'] > 5) {
        $_SESSION['contador'] = 5; 
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
    
    <form method="POST">
        <button name="incrementar" type="submit" <?php echo ($_SESSION['contador'] >= 5) ? 'disabled' : ''; ?>>Incrementar</button>
    </form>
    
    <form action="agenda.php" method="POST">
        <button type="submit" name="grabar">GRABAR</button>
    </form>

    <?php
    if ($_SESSION['contador'] > 0) {
        for ($i = 0; $i < $_SESSION['contador']; $i++) {
            $binario = rand(0, 4); 
            switch ($binario) {
                case 0:
                    echo "<img src=\"img/OIP0.jfif\">";
                    break;
                case 1:
                    echo "<img src=\"img/OIP1.jfif\">";
                    break;
                case 2:
                    echo "<img src=\"img/OIP2.jfif\">";
                    break;
                case 3:
                    echo "<img src=\"img/OIP3.jfif\">";
                    break;
                case 4:
                    echo "<img src=\"img/OIP4.jfif\">";
                    break;
            }
        }
    }
        ?>
</body>
</html>
