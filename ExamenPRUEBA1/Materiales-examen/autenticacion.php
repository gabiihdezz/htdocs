<?php
require_once('conexion.php');

function autenticarUsuario($login, $clave) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM jugador WHERE login=? AND clave=?");
    $stmt->bind_param("ss", $login, $clave);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
    $conn->close();
}
?>
