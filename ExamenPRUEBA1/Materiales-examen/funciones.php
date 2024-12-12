<?php
function autenticarUsuario($login, $clave) {
    global $conn;  
    
    $sql = "SELECT * FROM jugador WHERE login = '$login' AND clave = '$clave'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        return true;
    } else {
        return false;
    }
}
?>
