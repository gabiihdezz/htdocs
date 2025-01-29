<?php
require '../../../phpMyAdmin/vendor/autoload.php';

// Conectar a MongoDB
use MongoDB\Client;

$uri = 'mongodb://localhost:27017';

// Crear una instancia de MongoDB\Client
$client = new Client($uri);

// Seleccionar la base de datos
$database = $client->miBaseDeDatos;

// Seleccionar la colección
$collection = $database->Empresa;

// Datos a insertar
$document = [
    'Nombre' => 'Juan',
    'Apellido1' => 'Pérez',
    'Apellido2' => 'González',
    'Departamento' => 'Recursos Humanos', // Puede ser uno de los 3 o 4 departamentos
];

// Insertar el documento
$result = $collection->insertOne($document);

// Mostrar mensaje de éxito
echo "Documento insertado con el ID: " . $result->getInsertedId() . "<br>";

// Recuperar documentos de la colección
$cursor = $collection->find();

// Mostrar todos los documentos de la colección
foreach ($cursor as $document) {
    echo "Nombre: " . $document['Nombre'] . "<br>";
    echo "Apellido1: " . $document['Apellido1'] . "<br>";
    echo "Apellido2: " . $document['Apellido2'] . "<br>";
    echo "Departamento: " . $document['Departamento'] . "<br><br>";
}
?>
