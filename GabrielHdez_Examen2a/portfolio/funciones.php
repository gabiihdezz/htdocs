<?php
$conn = new mysqli('localhost', 'root', '', 'pictogramasphp', 3307);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function anadirImg ($fecha, $hora, $idpersona, $idimagen){
    global $conn;  
    $id = rand(0,1500);
    // Insertar en control_glucosa (se ejecutará solo la primera vez en el día)
    
    $sql = "INSERT INTO agenda (id, fecha, hora, idpersona, idimagen) 
            VALUES (?, ?, ?, ?, ?) ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issii", $id, $fecha, $hora, $idpersona, $idimagen);
    $stmt->execute();
    $stmt->close(); 

    header('../index.php');

}

function consultar ($fecha,$idpersona){
    global $conn;  
    // Insertar en control_glucosa (se ejecutará solo la primera vez en el día)
    
    $sql = "SELECT * FROM agenda WHERE  fecha = $fecha AND idpersona = $idpersona";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $stmt->close(); 

    header('../index.php');

}
?>