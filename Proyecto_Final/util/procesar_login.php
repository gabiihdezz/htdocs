<?php
require_once '../portfolio/login.php'; // Asegúrate de que este archivo conecta correctamente

session_start(); // Iniciar sesión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST["usuario"]); // Nombre de usuario ingresado
    $contra = trim($_POST["contra"]); // Contraseña ingresada

    // Verificar si la conexión a la BD está activa
    if (!$conn) {
        die("Error de conexión a la base de datos");
    }

    // Realizamos la consulta para obtener la información del usuario
    $sql = "SELECT * FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    // Si el usuario existe, verificamos la contraseña
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passwordHashDB = $row["contra"]; // Contraseña hasheada almacenada en la BD

        // Verificar la contraseña ingresada con el hash almacenado
   /*      var_dump($contra);
var_dump($passwordHashDB);
exit; */
        if (password_verify($contra, $passwordHashDB)) {
            // Si coinciden, iniciamos la sesión
            $_SESSION["usuario"] = $usuario;
            $_SESSION["nombre"] = $row["nombre"];

            // Redirigir al menú
            header("Location: ../inicio.php");
            exit;
        } else {
            $_SESSION["error_message"] = "Usuario o contraseña incorrectos.";
            header("Location: ../inicio.php");
            exit;
        }
    } else {
        $_SESSION["error_message"] = "Usuario no encontrado.";
        header("Location: ../inicio.php");
        exit;
    }

    $stmt->close();
}