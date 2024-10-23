<?php
if (isset($_POST['mes']) && isset($_POST['year'])) {
    $mes = $_POST['mes']; // Captura el mes
    $year = $_POST['year']; // Captura el año
echo "<style>
            body {
                background-color: lightblue;
                text-align: center;
            }
            table, tr {
                border-color: black;
                border: 2px solid black;
                border-collapse: collapse;
                position: center;
            }
            td {
                padding: 10px;
                text-align: center;
            }
        </style>";

        $mes = 10; // Ejemplo de mes
        $year = 2024; // Ejemplo de año
    
        echo "Calendario del mes número: " . ($mes) . " en el año " . ($year);
        echo "<br>";
    
        echo "<table>
                <tr>
                    <td>A ella no le sabe aparentar</td>
                </tr>
              </table>";}
    else{
    ?>
   <html>
    <head>
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
</head>
<body>
<div>
    <h2 >Calendario:</h2>
    <form action="FicheroCalendario.php" method="POST">
                <p>Introduzca un mes (n):<input type="text" name="btn" placeholder='Mes' ></p>
                <p>Introduzca un year: <input type="text" name="btn" placeholder='year' ></p>
                <button type="submit" >Enviar</button>
            </form>
    </div>
</body>
</html>
<?php }