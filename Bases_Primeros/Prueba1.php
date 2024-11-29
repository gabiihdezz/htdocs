<?php
 require_once 'Prueba1.php';
 $hn = 'localhost:8080';
 $db = 'dbsimon';
 $un = 'jugador';
 $pw = 'jugador'; 
 $conn = new mysqli($hn, $un, $pw, $db);
 if ($conn->connect_error) die("Fatal Error");
 $query = "SELECT * FROM classics";
 $result = $conn->query($query);
 if (!$result) die("Fatal Error"); 
 require_once 'login.php';
 $connection = new mysqli($hn, $un, $pw, $db);
 if ($connection->connect_error) die("Fatal Error");
 $query = "SELECT * FROM classics";
 $result = $connection->query($query);
 if (!$result) die("Fatal Error");
 $rows = $result->num_rows;
 for ($j = 0 ; $j < $rows ; ++$j)
 {
 $result->data_seek($j);
 echo 'ID: ' .htmlspecialchars($result->fetch_assoc()['id']) .'<br>';
 $result->data_seek($j);
 echo 'Usuario: ' .htmlspecialchars($result->fetch_assoc()['Us']) .'<br>';
 $result->data_seek($j);
 echo 'Contrasenha: ' .htmlspecialchars($result->fetch_assoc()['contr']) .'<br>';
 $result->data_seek($j);
 echo 'Rol: '. htmlspecialchars($result->fetch_assoc()['rol']).'<br>';
 }
 $result->close();
 $connection->close();
?>