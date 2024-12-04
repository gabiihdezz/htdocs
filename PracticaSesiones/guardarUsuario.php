<?php
echo <<<_END
<style>
    .toggle-eye {
        cursor: pointer;
        position: absolute;
        margin-left: -30px;
        margin-top: 10px; 
    }
    @font-face {
        font-family: 'Bebas';
        src: url('font_types/BebasNeue-Regular.ttf') format('truetype');
        font-style: normal;
    }   
    .titulo{
        font-family: 'Bebas', serif; 
        text-align: center;
        flex-grow: 1; 
        font-size: 20px;
    }
    body{
        background-color: lightblue;
        text-align: center;
    }
    .enviar{
        padding: 5px 15px;
        border-width: 4px;
        border-radius: 50px;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        font-size: 15px;
        color: var(--color-white);
        transition:
            scale 0.25s ease-in, 
            opacity 0.25s ease-in, 
            filter 0.25s ease-in;
    }
    .enviar:hover {
        transform: scale(1.2); 
    }
</style>
_END;

require_once '../login.php';  // Asegúrate de que la ruta sea correcta

$conn = new mysqli($hn, $un, $pw, $db, 3307);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Función para proteger contra inyección SQL
function get_post($conn, $var) {
    return $conn->real_escape_string($_POST[$var]);
}

if (isset($_POST['usuario']) && isset($_POST['clave'])) {
    $usuario = get_post($conn, 'usuario');           // Recibir el usuario
    $contraseña = get_post($conn, 'clave');
    $jugador=get_post($conn,'jugador');
    
    // Insertar en la base de da    tos con rol predeterminado "jugador"
    $query = "INSERT INTO usuarios (usu, contraseña, rol) VALUES ('$usuario', '$contraseña', '$jugador')";
    
    $result = $conn->query($query);
    
    if (!$result) {
        echo "Error en la inserción: " . $conn->error;
    } else {
        echo "Usuario registrado correctamente.";
    }
} else {
    echo "Por favor, completa todos los campos.";
}

$conn->close();
?>
