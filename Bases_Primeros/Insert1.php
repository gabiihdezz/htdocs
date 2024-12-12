<?php
require_once 'login.php';
$conn = new mysqli('localhost', 'root', '', 'bdsimon',3307); 
if ($conn->connect_error) die("Fatal Error"); 
$query = "INSERT INTO `bdsimon`( `Us`, `Contr`, `Rol`) VALUES ('Yolanda','Yolanda', 'Jugador')";
$result = $conn->query($query); 
?>