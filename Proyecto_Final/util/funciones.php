<?php
function autenticarUsuario($usuario, $contra) {
    global $conn;  // Usamos la conexión definida en conexion.php
    
    // Evitar inyecciones SQL
    $usuario = $conn->real_escape_string($usuario);
    $contra = $conn->real_escape_string($contra);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contra = '$contra'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        header(header: "Location: inicio.php");  
        return true;
    } else {
        return false;
    }
}

function registroUsuario($contra, $correo , $user, $fecha, $nombre, $apellidos) {
    global $conn;  // Usamos la conexión definida en conexion.php
    
    // Evitar inyecciones SQL
    $contra = $conn->real_escape_string($contra);
    $correo = $conn->real_escape_string($correo);
    $user = $conn->real_escape_string($user);
    $fecha = $conn->$fecha;
    $nombre = $conn->real_escape_string(string: $nombre);
    $apellidos = $conn->real_escape_string($apellidos);

    $sql = "INSERT INTO `usuario`( `fecha_nacimiento`, `nombre`, `apellidos`, `usuario`, `contra`, `correo`) 
                          VALUES ('$fecha','$nombre','$apellidos','$user','$contra','$correo')";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        header(header: "Location: inicio.php");  
        return true;
    } else {
        return false;
    }
}

?>
