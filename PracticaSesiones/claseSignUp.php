<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <style>
        .toggle-eye {
            cursor: pointer;
            position: absolute;
            margin-left: -30px;
            margin-top: 10px; 
        }
        @font-face {
        font-family: 'Bebas';
        src: url('font_types/BebasNeue-Regular.tff') format('truetype');
        font-style: normal;
    }   
    *{
        font-family: 'Bebas', sans-serif; 
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
            .estandar{
                background-color:beige;
            }
            .premium{
                color:gold;
            }
    </style>
</head>
<body>
    <form action="guardarUsuario.php" method="POST">
        <h3>REGISTRARSE:</h3>
        <input id="nombre" name="nombre" placeholder="Nombre"><br><br>
        <input id="apellidos" name="apellidos" placeholder="Apellidos"><br><br>
        <input id="CP" name="CP" placeholder="Código Postal"><br><br>
        <input id="usuario" name="usuario" placeholder="Usuario"><br><br>
        <div style="position: relative;">
            <input id="clave" name="clave" type="password" placeholder="Contraseña">
            <span class="toggle-eye" onclick="togglePassword()">👁️</span>
        </div>
        <br>
        <br>
        <input class="estandar" type="radio" name="jugador" value="jugador" href="#" >Jugador Estándar</input>
        <input class="premium" type="radio" name="jugador" value="premium" href="#" >Jugador Chingon</input>
        <br>
        <br>        

        <a href="clase1.php">Iniciar Sesion</a>
        <button type="submit" value="enviar">Enviar</button>
    </form>

    <script>
        function togglePassword() {
            const passwordField = document.getElementById('clave');
            const passwordFieldType = passwordField.getAttribute('type');
            passwordField.setAttribute(
                'type',
                passwordFieldType === 'password' ? 'text' : 'password'
            );
        }
    </script>
</body>
</html>
