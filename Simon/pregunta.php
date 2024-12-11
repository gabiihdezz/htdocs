<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMON - Repite la Secuencia</title>
    
    <style>
        body { text-align: center; background-color: aliceblue; }
        button {
            padding: 15px 30px; border-radius: 30px; font-size: 18px; cursor: pointer;
            margin: 10px; transition: transform 0.3s ease;
        }
        button:hover { transform: scale(1.1); }
        .degradado {
                background: linear-gradient(to right, #ffb3b3, #b3ffb3, #b3d9ff, #fff2b3);
                opacity: 100%;
                width: 10%; 
                height: 20px;
                border: 1px solid black; }

        .rojo { background-color: red; color: white; }
        .verde { background-color: green; color: white; }
        .azul { background-color: blue; color: white; }
        .amarillo { background-color: yellow; color: black; }
    </style>
</head>
<body>
    <h1>Selecciona los colores en el orden correcto</h1>
    <form action="comprobar.php" method="POST">
        <?php
        for ($i = 1; $i <= 4; $i++) {
            echo "<select class='degradado' name='color$i' required>
                    <option  value='' disabled selected>Color $i</option>
                    <option class='rojo' value='Rojo'>Rojo</option>
                    <option class='verde' value='Verde'>Verde</option>
                    <option class='azul' value='Azul'>Azul</option>
                    <option class='amarillo' value='Amarillo'>Amarillo</option>
                  </select>";
        }
        ?>
        <br><br>
        <button type="submit">Enviar secuencia</button>
    </form>
</body>
</html>
