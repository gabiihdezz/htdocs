<?php
session_start();
if (!isset($_SESSION["r"])) {
    $_SESSION["r"] = 0; 
}

if (isset($_POST["prueba"])) {
    $pruebas= $_SESSION["r"]++; 
    echo "<div> Número de intentos: $pruebas</div>";
    $num1=($_SESSION["cartas"][$_POST["pareja1"]]);
    $num2=($_SESSION["cartas"][$_POST["pareja2"]]);
    if($num1>5 || $num2>5){
        echo "<br>Debe de ser un numero comprendido entre el 0 y el 5";
    }
    else if($num1>5 && $num2>5){
        echo "<br>Debe de ser un numero comprendido entre el 0 y el 5";
    }
    else if($num1 === $num2){
        echo "<br>Correcto, has acertado: <br>".$num1." = ".$num2;
    }
    else{
        echo "<br> Has fallado, vuelva a intentarlo";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego de Cartas</title>
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
        .go{
            text-align: center;
            margin-left: 30%;
            margin-right:30%;
        }
        ul{
            text-align: justify;
            display: block;
        }
    </style>
</head>
<body>
    <h1>Bienvenido/a, <?php echo htmlspecialchars($_SESSION["login"]); ?></h1>
    <?php
        $login= $_SESSION["login"];
        $num1=($_SESSION["cartas"][$_POST["pareja1"]]);
        $num2=($_SESSION["cartas"][$_POST["pareja2"]]);  
        if($num1 === $num2)  {
            echo "<h3>Correcto!+1</h3>";
            require_once 'materiales-examen/conexion.php';
            $conn = new mysqli('localhost', 'root', '', 'pruebas',3307); 
            if ($conn->connect_error) die("Fatal Error"); 
            $query = "UPDATE `jugador` where `login`=$login SET `puntos` = `puntos` + 1;";
            $result = $conn->query($query); 
        }
        else{
        require_once 'materiales-examen/conexion.php';
        $conn = new mysqli('localhost', 'root', '', 'pruebas',3307); 
        if ($conn->connect_error) die("Fatal Error"); 
        $query = "UPDATE `jugador` where `login`=$login SET `puntos` = `puntos` - 1;";
        $result = $conn->query($query); 
        echo "<h3>Fallo posiciones.Valor de la primera carta: $num1 y de la segunda: $num2 </h3>";}
    ?>
    <div>
    <?php
        require_once 'materiales-examen/conexion.php';
        $conn = new mysqli('localhost', 'root', '', 'pruebas', 3307); 
        if ($conn->connect_errno) {
            printf("Falló la conexión: %s\n", $conn->connect_error);
            exit();
        }
        $query = "SELECT * FROM jugador";
        $result = $conn->query($query);
        if (!$result) {
            die("Query failed: " . $conn->error);
        }
        $numRows = $result->num_rows;
        for ($j = 0; $j < $numRows; ++$j) {
            $result->data_seek($j);
            $row = $result->fetch_assoc(); 
            if ($row) {
                echo "<div class= \"go\"><ul>";
                echo 'Usuario: ' . htmlspecialchars($row['login']) ;
                echo '<li>Puntos: ' . htmlspecialchars($row['puntos']) . '</li>';
                echo '<li>Extra: ' . htmlspecialchars($row['extra']) . '</li><br>';
                echo "</ul></div>";
                
            }}
        $conn->close();
    ?>
        <a href="mostrarcartas.php"><button>Seguir con la Partida</button></a>
    </div>
</body>
</html>
