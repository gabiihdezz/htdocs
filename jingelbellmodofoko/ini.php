<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
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
                margin-top:10px;                
                flex-grow: 1; 
                font-size: 40px;
            }
        body{
            background-color: lightblue;
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

</style>
</head>
<body>

<?php
$i=0;
for($i=0; $i <=3;$i++){ ?>
 <form method='post' action='upload.php' enctype='multipart/form-data'><br>
 Select File: <input type='file' name='filename$i' name='filename$i' size='10'>
 <?php  }?><br>
 <input type='submit' value='Upload'>
 </form>
</body>
</html>