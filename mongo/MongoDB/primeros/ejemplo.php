<?php
require 'C:\xampp\phpMyAdmin\vendor\autoload.php';

//Conectar a MongoDB
use MongoDB\Client;

$client = new Client("MongoDB://localhost:27017");

//Seleccionar la base de datos
$database = $client ->miBaseDeDatos;

//Seleccionar la coleccion
$colection  = $database ->miColeccion;

//insertar un documento
$document = [
    'nombre' => 'Juan',
    'edad' => 30,
    'ciudad' => 'Madrid',
];

$result = $collection -> insertOne($document);


//Recuperar documentos
$cursor = $collection -> find();



?>