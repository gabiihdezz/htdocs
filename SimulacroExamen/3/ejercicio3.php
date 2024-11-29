<?php
session_start();
if(isset($_POST["color"])){

$num=rand(0,100);
$intentos=0;
$resul="";
if ($_SESSION["color"] <= $num) {
    $intentos++;
    $resul="menor";}
else if ($_SESSION["color"] >= $num) {
    $intentos++;
    $resul="mayor";}
if ($_SESSION["color"] == $num) {
    $intentos++;
    $resul=" correcto, enhorabuena. \n Lo has adivinado en "+ $intentos+ " intentos";}
    
echo <<<_END
<p>Tu numero es $resul :</p>
<form action="ejercicio3.php" method="POST">
<input type="text" id="color" name="color" required>
<a href="ejercicio3.php">
     <input type="submit" value="Enviar">
</a>
</form>
_END;

}    
else{
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
    <style>
        body {
            text-align: center;
            background-color: aliceblue;
        }
        .enviar {
            padding: 10px 20px;
            border-radius: 50px;
            font-size: 15px;
            cursor: pointer;
            transition: transform 0.5s ease;
        }
        .enviar:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div>
        <p>Adivina mi numero:</p>
        <form action="ejercicio3.php" method="POST">
        <input type="text" id="color" name="color" required>
        <a href="ejercicio3.php">
             <input type="submit" value="Enviar">
        </a>
        </form>
 
    </div>
</body>
</html>
<?php }