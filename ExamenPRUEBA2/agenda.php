<?php
session_start();

// Verificar que el 'codusuario' está definido en la sesión
if (!isset($_SESSION['codusuario'])) {
    echo "Error: La variable 'codusuario' no está definida en la sesión.";
    exit;
}

// Inicializar el contador si no está definido
if (!isset($_SESSION['contador'])) {
    $_SESSION['contador'] = 0;
}

// Conexión a la base de datos
require_once 'conexion.php';
$conn = new mysqli('localhost', 'root', '', 'pruebas', 3307);
if ($conn->connect_error) die("Error de conexión: " . $conn->connect_error);

// Verificar que el 'codusuario' existe en la base de datos
$codusuario = $_SESSION['codusuario'];
$query = "SELECT * FROM usuarios WHERE Codigo = '$codusuario'";
$result = $conn->query($query);

// Si el usuario no existe en la base de datos, mostrar error
if ($result->num_rows == 0) {
    echo "Error: El usuario no existe en la base de datos.";
    exit;
}

// Insertar los contactos cuando se envíen
if (isset($_POST['enviar'])) {
    for ($i = 1; $i <= $_SESSION['contador']; $i++) {
        $nombre = htmlspecialchars($_POST["nombre$i"]);
        $email = htmlspecialchars($_POST["email$i"]);
        $telefono = htmlspecialchars($_POST["telefono$i"]);

        // Preparar la consulta para evitar inyecciones SQL
        $query = "INSERT INTO `contactos` (`nombre`, `email`, `telefono`, `codusuario`) 
                  VALUES ('$nombre', '$email', '$telefono', '$codusuario');";

        if (!$conn->query($query)) {
            echo "Error al guardar el contacto $i: " . $conn->error;
        }
    }
    echo "<h3>Contactos grabados correctamente.</h3>";
    $_SESSION['contador'] = 0;  // Resetear el contador después de guardar los contactos
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Contactos</title>
    <style>
        body {
            text-align: center;
            background-color: aliceblue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        button, .button {
            padding: 10px 20px;
            margin: 5px;
            border-radius: 10px;
            font-size: 15px;
            cursor: pointer;
            transition: transform 0.3s ease;
        }
        button:hover {
            transform: scale(1.1);
        }
        table {
            margin: 0 auto;
            border-collapse: collapse;
            width: 80%;
        }
        td, th {
            border: 1px solid #000;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Hola <?php echo htmlspecialchars($_SESSION['nombre']); ?>, ¿cuántos contactos deseas grabar?</h3>
    <h3>Puedes grabar entre 1 y 5 contactos. Incrementa el contador y luego graba.</h3>

    <h1>Contador: <?php echo $_SESSION['contador']; ?></h1>

    <form action="" method="POST">
        <button type="submit" name="incrementar">INCREMENTAR</button>
    </form>

    <?php if ($_SESSION['contador'] > 0): ?>
    <form action="" method="POST">
        <table>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Teléfono</th>
            </tr>
            <?php for ($i = 1; $i <= $_SESSION['contador']; $i++): ?>
            <tr>
                <td>Contacto <?php echo $i; ?></td>
                <td><input type="text" name="nombre<?php echo $i; ?>" required></td>
                <td><input type="email" name="email<?php echo $i; ?>" required></td>
                <td><input type="tel" name="telefono<?php echo $i; ?>" required></td>
            </tr>
            <?php endfor; ?>
        </table>
        <input type="submit" class="button" name="enviar" value="GRABAR CONTACTOS">
    </form>
    <?php endif; ?>
</body>
</html>
