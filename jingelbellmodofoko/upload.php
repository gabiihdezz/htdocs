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
                font-family: 'Bebas';
                src: url('../../font_types/BebasNeue-Regular.ttf') format('truetype');
                font-style: normal;
            }   
            *{
                font-family: 'Bebas', serif; 
                text-align: center;
                margin-top:30px;                
                flex-grow: 1; 
                font-size: 40px;
            }
        body{
            background-color: #d2b48c;
            text-align: center;
        }
        .enviar{
            padding: 5px 15px;
            margin:30px;
            border-width: 4px;
            border-radius: 50px;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color: var(--color-white);
            transition:
                scale 0.25s ease-in, 
                opacity 0.25s ease-in, 
                filter 0.25s ease-in;}
            .enviar:hover {
    transform: scale(1.2); 
        }
        img{
            height:auto;
            width:100px
        }
</style>
_END;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<?php
if ($_FILES)
 {
 $name = $_FILES['filename']['name'];
 move_uploaded_file($_FILES['filename']['tmp_name'], "img/$name");
 echo "</body></html>";  }
 echo "<br><img src='img/$name'>";
 echo "<br>";
 echo "<img src=\"img/madera.jpg\">";
 echo "<img src=\"img/madera.jpg\">";
 echo "<br>";
 echo "<img src=\"img/madera.jpg\">";
 echo "<img src=\"img/madera.jpg\">";
 echo "<img src=\"img/madera.jpg\">";
 echo "<br>";
 echo "<img src=\"img/madera.jpg\">";
 echo "<img src=\"img/madera.jpg\">";
 echo "<img src=\"img/madera.jpg\">";
 echo "<img src=\"img/madera.jpg\">";
 echo "<br>";
 echo "<img src=\"img/madera.jpg\">";

echo "<br><a href=\"ini.php\" style=\"color:green\" >Volver</a>";

?>