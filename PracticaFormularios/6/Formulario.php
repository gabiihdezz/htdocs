<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Selección</title>
    <style>
            @font-face {
                    font-family: 'NunitoXtra';
                    src: url('../html/Nunito-Black.ttf') format('truetype'); /* Ensure the path is correct */
                    font-style: normal;
                }   
                .titulo{
                    font-family: 'NunitoXtra', serif; /* Applies the custom font */
                    text-align: center;
                    flex-grow: 1; /* Esto permite que el texto ocupe el centro */
                    font-size: 20px;
                }
            body{
                background-color: lightblue;
                text-align: center;
            }
            button{
                padding: 5px 10px;
                border-width: 4px;
                border-radius: 50px;
                font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                font-size: 10px;
                color: var(--color-white);
                transition:
                    scale 0.25s ease-in, 
                    opacity 0.25s ease-in, 
                    filter 0.25s ease-in;}
                .enviar:hover {
        transform: scale(1.2); 
            }
    </style>
</head>
<body>
    <div>
            <form action="" method="POST">
                <p>Numero de elementos: <input type="text" name="Elementos" placeholder='Elementos'></p>
            </form>
            <form action="resultadoFormularioDinamico.php" method="POST">
                <?php
                for ($i = 0; $i < $elementos; $i++) {
                    echo <<<_END
                    <label for="num$i">$i:</label>
                    <input type="text" id="num$i" name="nn" required>
                    <br>
                    _END;
                    $suma+=$i;
                }
                echo '<input type="submit" value="Enviar">';
                ?>

    </div>
</body>
</html>