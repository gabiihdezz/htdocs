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
    
<form action="pag2.php" method="POST">
    <h3>De que color quieres que se vea la pagina: </h3>
    <form action="pag2.php" method="POST">
        <button type="submit" name="radio" value="Rojo" href="#" >Rojo</button>
        <button type="submit" name="radio" value="Verde" href="#">Verde</button>
        <button type="submit" name="radio" value="Azul  " href="#">Azul</button>
    </form>
</body>
</html>
