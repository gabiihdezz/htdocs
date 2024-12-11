<?php
function autenticarUsuario($nombre, $clave) {
    global $conn;  // Usamos la conexión definida en conexion.php
    
    // Evitar inyecciones SQL
    $nombre = $conn->real_escape_string($nombre);
    $clave = $conn->real_escape_string($clave);

    // Consulta para verificar el usuario
    $sql = "SELECT * FROM usuarios WHERE Nombre = '$nombre' AND clave = '$clave'";
    $resultado = $conn->query($sql);

    // Si se encuentra un usuario, devuelve true
    if ($resultado && $resultado->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
?>
