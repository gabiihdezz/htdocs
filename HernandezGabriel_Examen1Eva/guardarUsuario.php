<?php
session_start();
echo <<<_END
<style>
    .toggle-eye {
        cursor: pointer;
        position: absolute;
        margin-left: -30px;
        margin-top: 10px; 
    }
    @font-face {
                font-family: 'NunitoXtra';
                src: url('Nunito-Black.ttf') format('truetype');
                font-style: normal;
            }   
            .titulo{
                font-family: 'NunitoXtra', serif; 
                text-align: center;
                flex-grow: 1; 
                font-size: 20px;
            }
        body{
            background-color: lightblue;
            text-align: center;
        }
        .enviar{
            padding: 5px 15px;
            border-width: 4px;
            border-radius: 50px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-size: 15px;
            color: var(--color-white);
            transition:
                scale 0.25s ease-in, 
                opacity 0.25s ease-in, 
                filter 0.25s ease-in;}
            .enviar:hover {
    transform: scale(1.2); 
        }

</style>
_END;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login=($_SESSION["login"]);
    $respuesta = $_POST['respuesta'];
    $hora=rand(0,23).':'.rand(0,60);
    $fecha=rand(2024,2029).':'.rand(1,12).':'.rand(1,31); //fecha imposible para ver mas facil en la base de datos
    $conn = new mysqli('localhost', 'root', '', 'jerogrifico',3307);
    if ($conn->connect_error) die("Fatal Error"); 
    $query = "INSERT INTO `respuestas`(`fecha`, `login`, `hora`, `respuesta`) VALUES ('$fecha','$login', '$hora', '$respuesta')";
    $result = $conn->query($query); 
    echo "Registrado exitosamente en la base de datos.";
    echo <<<_END
        <div>
            <a href="inicio.php">
                <button>Volver a Inicio</button>
            </a>
        </div>  
    _END;

} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMON - Muestra la Secuencia</title>
    <style>
        body { text-align: center; background-color: aliceblue; }
      
        button {
            padding: 10px 20px; font-size: 18px; cursor: pointer; margin-top: 20px;
        }
    </style>
</head>
<body>
<?php

if (isset($_SESSION["puntos"])) {
    $puntos = $_SESSION["puntos"];
    echo "Puntos hasta ahora: $puntos";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $respuesta = $_POST["respuesta"];
    
    exit();
}
?>

</body>
</html>
