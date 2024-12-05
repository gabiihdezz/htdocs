<?php
session_start();
echo <<<_END
<style>
img {
    height: 180px;
    width: 8%;
    margin: 5px;}
</style>
_END;

//1 combinacion random, se guardan en la sesion
if (!isset($_SESSION["cartas"])) {
    $_SESSION["cartas"] = array_merge([1, 2, 3, 1, 2, 3]); 
    shuffle($_SESSION["cartas"]);
}

if (!isset($_SESSION["levantada"])) {
    $_SESSION["levantada"] = -1; 
}

if (isset($_POST["cartaSeleccionada"])) {
    $_SESSION["levantada"] = (int)$_POST["cartaSeleccionada"]; 
}

for ($i = 0; $i < 6; $i++) {
    if ($i == $_SESSION["levantada"]) {
        switch ($_SESSION["cartas"][$i]) {
            case 1:
                echo "<img src=\"materiales-examen/copas_02.jpg\">";
                break;
            case 2:
                echo "<img src=\"materiales-examen/copas_03.JPG\">";
                break;
            case 3:
                echo "<img src=\"materiales-examen/copas_05.JPG\">";
                break;
        }
    } else {
        echo "<img src=\"materiales-examen/boca_abajo.jpg\">";
    }
}

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
    </style>
</head>
<body>
    <h1>Bienvenido/a, <?php echo htmlspecialchars($_SESSION["login"]); ?></h1>
    <form action="" method="POST">
        <?php for ($i = 0; $i < 6; $i++){?>
            <button type="submit" name="cartaSeleccionada" value="<?php echo $i; ?>">Levantar Carta nº<?php echo $i + 1; ?></button>
        <?php } ?>
    </form>
    <h3>Introduzca una pareja de Cartas</h3>
    <form action="resultado.php" method="POST">
        <input type="text" name="pareja1">
        <input type="text" name="pareja2">
        <button type="submit" name="prueba" value="<?php echo $r++; ?>">Probar</button>
    </form>
</body>
</html>
