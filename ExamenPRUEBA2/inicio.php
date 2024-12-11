<?php
session_start();

// Reiniciar el contador cada vez que accedas a la página (no solo cuando no está definido)
$_SESSION['contador'] = 0;

// Verificar si se está incrementando el contador
if (isset($_POST['incrementar'])) {
    if ($_SESSION['contador'] < 5) {
        $_SESSION['contador']++;  // Incrementar el contador
    } else {
        // Redirigir a agenda.php si el contador ha alcanzado 5
        header("Location: agenda.php");
        exit;
    }
}

// Si se presiona el botón "grabar", no hacemos nada por ahora
if (isset($_POST['grabar'])) {
    // Aquí podrías manejar lo que necesitas hacer al presionar "GRABAR"
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contador Incrementar</title>
    <style>
        body {
            text-align: center;
            background-color: aliceblue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        button {
            padding: 10px 20px;
            margin: 5px;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        button:hover {
            transform: scale(1.1);
        }
        img {
            height:60px;    
        }

    </style>
</head>
<body>
    <h3>Hola <?php echo htmlspecialchars($_SESSION["nombre"]); ?>, ¿cuántos contactos deseas grabar?</h3>
    <h3>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR, grabarás un usuario más. </h3>
    <h3>Cuando el número sea el deseado, pulsa en GRABAR. </h3>
    <h1>Contador: <?php echo $_SESSION['contador']; ?></h1>

    <!-- Botón para incrementar el contador -->
    <form action="" method="POST">
        <button type="submit" name="incrementar">INCREMENTAR</button>
    </form>

    <!-- Botón para "grabar" los contactos -->
    <form action="agenda.php" method="POST">
        <button type="submit" name="grabar">GRABAR</button>
    </form>

    <?php
    // Mostrar imágenes aleatorias si el contador es mayor que 0
    if ($_SESSION['contador'] > 0) {
        for ($i = 0; $i < $_SESSION['contador']; $i++) {
            $binario = rand(0, 4); // Generar número aleatorio del 0 al 4
            switch ($binario) {
                case 0:
                    echo "<img src=\"OIP0.jfif\">";
                    break;
                case 1:
                    echo "<img src=\"OIP1.jfif\">";
                    break;
                case 2:
                    echo "<img src=\"OIP2.jfif\">";
                    break;
                case 3:
                    echo "<img src=\"OIP3.jfif\">";
                    break;
                case 4:
                    echo "<img src=\"OIP4.jfif\">";
                    break;
            }
        }
    }
    ?>
</body>
</html>
