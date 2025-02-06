<?php
require '../../../phpMyAdmin/vendor/autoload.php';
use MongoDB\Client;

//conectar a mongoDB
$client = new Client("mongodb://localhost:27017");
$collection = $client->AyuGijon->deportes;

//leer el contenido del archivo JSON
$jsonFile ='gijon.alojamiento.json';
$jsonData ='';

?>