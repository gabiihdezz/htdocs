<?php
session_start();
require('portfolio/funciones.php');


$query = "
    SELECT imagenes.imagen, imagen AS imagen, descripcion AS descripcion    
    FROM imagenes
";



$result = $conn->query($query);
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
            width:140px;
            height: auto;
        }
        table,th{
            margin: 3px;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <div>
    <h5>Listado de pictogramas: </h5>
    <table>
        <tr>
            <?php while ($insert = $result->fetch_assoc()): ?>
                <th><div><img src="<?php echo htmlspecialchars($insert['imagen']); ?>"> <br><?php echo htmlspecialchars($insert['descripcion']); ?><br> <?php echo htmlspecialchars($insert['imagen']); ?><hr></th>
            <?php endwhile; ?>
        </tr>
    </table>

    <a href="anadir.php">AÑADIR</a>
    <a href="consultar.php">Consultar</a>
    </div>
</body>
</html>
