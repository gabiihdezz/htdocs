<?php
echo <<<_END
<style>
body {
    background-color: <?php echo htmlspecialchars($color); ?>;
    text-align: center;
}
h1 {
    color: <?php echo $color === 'white' ? 'black' : 'white'; ?>; 
}
button {
    padding: 10px 20px;
    border-radius: 10px;
    font-size: 16px;
    border: none;
    border: 2px solid black;
    cursor: pointer;
    margin: 10px;
}

.toggle-eye {
    cursor: pointer;
    position: absolute;
    margin-left: -30px; 
    margin-top: 10px; 
}
</style>
_END;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Verificar usuario en archivo
    $file = 'usuarios.txt';
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $valid = false;

    foreach ($lines as $line) {
        list($storedUser, $storedPass) = explode(',', $line);
        if ($storedUser == $usuario && $storedPass == $clave) {
            $valid = true;
            break;
        }
    }

    if ($valid) {
        echo "Correcto, bienvenido $usuario";
    } else {
        echo "Usuario o contraseña incorrectos. <a href='claseSignUp.php'>Registrarse</a>";
    }
}
?>
