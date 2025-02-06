<?php
session_start();
echo <<<_END
<style   style>
img {
    height: 300px;
    max-width: 100%;
    margin: 5px;}
</style>
_END;


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen 12-12</title>
    <style>
        body {
            text-align: center;
            background-color: aliceblue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif,sans-serif;
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
    </style>
</head>
<body>
    <?php   
        $conn = new mysqli('localhost', 'root', '', 'jerogrifico',3307);
        if ($conn->connect_error) die("Fatal Error"); 

        $query = "
        SELECT jugador.login, nombre AS nombre
        FROM jugador; 
    ";
    
    
    
    $result = $conn->query($query);


    if ($row = $result->fetch_assoc() ): ?>

    <h1>Bienvenido/a, <?php echo htmlspecialchars($row['nombre']); ?>!</h1>
        <img src="imagen/20241212.jpg" alt="">
        <h3>¡Todos hablan de la fiesta de ayer!</h3>
    <form action="guardarUsuario.php" method="POST">
        <p>Solución al jeroglífico:</p><input type="text" name="respuesta">
        <button type="submit" name="prueba" value="<?php echo $r++; ?>">Enviar</button>
    </form>
        <a href="puntos.php"><button>Ver puntos por jugador</button></a>
        <a href="resultado.php"><button>Resultados de día</button></a>
        <?php endif;?>
    </body>
</html>
