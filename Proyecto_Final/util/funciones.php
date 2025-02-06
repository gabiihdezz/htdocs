<?php
function autenticarUsuario($usuario, $clave) {
    global $conn;  // Usamos la conexión definida en conexion.php
    
    // Evitar inyecciones SQL
    $usuario = $conn->real_escape_string($usuario);
    $clave = $conn->real_escape_string($clave);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND clave = '$clave'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        header(header: "Location: inicio.php");  
        return true;
    } else {
        return false;
    }
}
?>
