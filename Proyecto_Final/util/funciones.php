<?php
function autenticarUsuario($usuario, $contra) {
    global $conn;

    $usuario = $conn->real_escape_string($usuario);

    $sql = "SELECT * FROM usuario WHERE usuario = '$usuario'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $hashAlmacenado = $fila["contra"]; 

        if (password_verify($contra, $hashAlmacenado)) {
            $_SESSION["usuario"] = $usuario;
            header("Location: ../inicio.php");
            exit();
        } else {
            return false; 
        }
    } else {
        return false; 
    }
}

function hashPassword($contra) {
    return password_hash($contra, PASSWORD_BCRYPT);
}
 function verifyPassword($contra, $hash) {
    global $conn;  
    $hash = "SELECT * FROM `usuario`( `contra`)" ;
    $resultado = $conn->query($hash);
    if ($hash == $contra){
        true;
    }
    else{
        false;
        echo "error";
    }
    return password_verify($contra, $hash);
}
function registroUsuario($contra, $correo , $usuario, $fecha, $nombre, $apellidos) {
    global $conn;  
    $contra = $_POST["contra"];  
    $contraHash = password_hash($contra, PASSWORD_BCRYPT);  

    $correo = $conn->real_escape_string($correo);
    $usuario = $conn->real_escape_string($usuario);
    $fecha = $conn->real_escape_string($fecha);
    $nombre = $conn->real_escape_string(string: $nombre);
    $apellidos = $conn->real_escape_string($apellidos);
    
    $sql = "INSERT INTO `usuario`( `fecha_nacimiento`, `nombre`, `apellidos`, `usuario`, `contra`, `correo`) 
                          VALUES ('$fecha','$nombre','$apellidos','$usuario','$contraHash','$correo')";
    $resultado = $conn->query($sql);
    if ($resultado === false) {  // Si la consulta falló
        error_log("Error en la consulta: " . $conn->error); // Guardar en logs en vez de mostrar en pantalla
        return false;
    }
    if ($conn->affected_rows > 0) { 
        header("Location: ../inicio.php");
        exit();
    } else {
        return false;
    }
}
?>