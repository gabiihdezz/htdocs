<?php
session_start();

if (!isset($_SESSION["intentos"])) {
    $_SESSION["intentos"] = 0;
}

$secuenciaCorrecta = $_SESSION["secuencia"];
$respuestaUsuario = [
    $_POST["color1"],
    $_POST["color2"],
    $_POST["color3"],
    $_POST["color4"]
];

$acierto = ($secuenciaCorrecta === $respuestaUsuario);

$_SESSION["intentos"]++;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMON - Resultado</title>
    <style>
        body { text-align: center; background-color: aliceblue; }
        .mensaje { font-size: 24px; margin-top: 20px; }
        button {
            padding: 10px 20px; font-size: 18px; cursor: pointer; margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="mensaje">
        <?php
        if ($acierto) {
            echo "<h1>¡Felicidades! Has acertado la secuencia.</h1>";
            echo "Intentos: " . $_SESSION["intentos"];
            ?>
            <a href="index.php">
                <button>Sigue Jugando</button>
            </a>
            <?php
        } else {
            echo "<h1>Lo siento, la secuencia era incorrecta.</h1>";
            echo "<p>La secuencia correcta era: " . implode(", ", $secuenciaCorrecta) . "</p>";
            echo "Intentos: " . $_SESSION["intentos"];
            ?>
            <form action="guardarUsuario.php" method="POST">
            <h3>Introduzca su Usuario y contraseña a modo de registro:</h3>
            <input id="Usuario" name="Usuario" placeholder="Usuario" required><br><br>
            <div style="position: relative;">
                <input id="contrasena" name="contrasena" type="password" placeholder="Contraseña" required>
            </div>
            <div>
                <button class="enviar" type="submit" value="enviar">¡Enviar!</button>
            </div>
            </form>
    
            <a href="index.php">
                <button>Nueva Partida</button>
            </a>
        <?php
        }
        ?>
    </div>
</body>
</html>
<?php
unset($_SESSION["secuencia"]);
?>
