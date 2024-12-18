<?php

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
_END;

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
 $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
 if($imageFileType === "txt" ) {
    echo "Correcto, El fichero es tipo txt<br>";
    $uploadOk = 0;
}

 if (file_exists($target_file)) {
    echo "El fichero existe.<br>";
    $uploadOk = 0;   
   if ($_FILES["fileToUpload"]["size"] > 3000) {
    echo "El fichero es demasiado grande.<br>";
    $uploadOk = 0;
}}

if($imageFileType != "txt" ) {
    echo "Sorry, only TXT files are allowed.<br>";
    $uploadOk = 0;
}

echo "<br><a href=\"php.ini\" >Volver</a>";

?>