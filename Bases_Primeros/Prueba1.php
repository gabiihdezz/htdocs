<?php 
require_once 'Prueba1.php'; 
$conn = new mysqli($hn, $un, $pw, $db); 
if ($conn->connect_error) die("Fatal Error"); 
$query = "SELECT usu,contra FROM usuarios"; 
$result = $conn->query($query); 
if (!$result) die("Fatal Error"); 
$row = $result->num_rows; 
for ($j = 0; $j < $row; ++$j) { 
    $result->data_seek($j); 
    $row = $result->fetch_assoc(); 
    echo 'Usuario: ' . htmlspecialchars($row['usu']) . '<br>'; 
    echo 'Contraseña: ' . htmlspecialchars($row['contra']) . '<br><br>'; 
    } 
?>
