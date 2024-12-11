<?php
require_once('conexion.php');

function autenticarUsuario($login, $clave) {
    global $conn;
    $stmt = $conn->prepare("SELECT clave FROM usuarios WHERE login = ?");
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $hashedPassword = $result->fetch_assoc()['clave'];
        if (password_verify($clave, $hashedPassword)) {
            return true;
        }
    }
    return false;
}

?>
