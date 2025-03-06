<?php

$idpersona = $_SESSION["idpersona"];

function autenticarUsuario($login, $clave) {
    global $conn;  // Usamos la conexión definida en conexion.php
    
    // Evitar inyecciones SQL
    $login = $conn->real_escape_string($login);
    $clave = $conn->real_escape_string($clave);

    $sql = "SELECT * FROM jugador WHERE login = '$login' AND clave = '$clave'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        header(header: "Location: inicio.php");  
        return true;
    } else {
        return false;
    }
}
?>
