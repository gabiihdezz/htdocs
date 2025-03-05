<?php
session_start();
require('portfolio/funciones.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fecha = trim($_POST["fecha"]);
    if($fecha==NULL){
        $fecha='27-02-2025';
    }
    $hora = trim($_POST["hora"]);
    $idpersona = ($_POST["persona"]);
    $idimagen = ($_POST["idimagen"]);

    // Llamar a la función para guardar en la base de datos
    $resultados = anadirImg($fecha, $hora, $idpersona, $idimagen) ;
}
$imagen = "
    SELECT imagenes.imagen, imagen AS imagen, descripcion AS descripcion, idimagen AS idimagen   
    FROM imagenes";



$resImg = $conn->query($imagen);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Inicial Examen</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        *{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        img{
            width:80px;
            height: auto;
        }
        table{
            border:1px solid black;
        }
    </style>
</head>
<body class="container">
<a href="index.php">Inicio</a>

<h3>Añadir datos agenda</h3>
<form method="POST" action="">
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha"><br>
        <br>
    <label for="hora">Hora:</label>
    <input type="time" name="hora" required><br>
    <br>

    <label for="persona">persona:</label>
        <select  id="persona" name="persona" required>
            <option value="">Selecciona una opción</option>
            <option value="1">Carlos</option>
            <option value="2">Juan</option>
            <option value="3">Manuel</option>
        </select><br>
        <br>

        <label for="idimagen">Selecciona una imagen:
    <br>
    <?php while ($insert = $resImg->fetch_assoc()): ?>
        <input id="idimagen" type="radio" name="idimagen" value="<?php echo htmlspecialchars($insert['idimagen']); ?>" required>  
                <tr><img src="<?php echo htmlspecialchars($insert['imagen']); ?>"> <br><?php echo htmlspecialchars($insert['descripcion']); ?><br> <?php echo htmlspecialchars($insert['imagen']); ?><hr></tr>
            <?php endwhile; ?>
        <input type="submit" value="Añadir Control">
    <a href="index.php">Volver al inicio</a>
    <a href="consultar.php">Consultar</a>

</form>
</body>
</html>