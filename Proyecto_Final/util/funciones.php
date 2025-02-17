<?php
function autenticarUsuario($usuario, $contra) {
    global $conn;
    
    $usuario = $conn->real_escape_string($usuario);
    $contra = $conn->real_escape_string($contra);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario' AND contra = '$contra'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        echo "truisimo";
        header(header: "Location: inicio.php");  
        return true;
    } else {
        echo "falsisimo";
        return false;
    }
}

function pasarHash($contra) {
    global $conn;
    $contra = $conn->real_escape_string($contra);

    $contraHash = password_hash($contra, PASSWORD_BCRYPT);

    return $contraHash;  
}

function registroUsuario($contra, $correo , $user, $fecha, $nombre, $apellidos) {
    global $conn;  
    $contra = $_POST["contra"];  
    $contraHash = pasarHash($contra);  
    
    $contra = $conn->real_escape_string($contraHash);;
    $correo = $conn->real_escape_string($correo);
    $user = $conn->real_escape_string($user);
    $fecha = $conn->real_escape_string($fecha);
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
