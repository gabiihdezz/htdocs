<?php
$conn = new mysqli('localhost', 'root', '', 'diabetesdb', 3307);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

function autenticarUsuario($usuario, $contra) {
    global $conn;

    if (!$conn) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    $sql = "SELECT id_usu, nombre, contra FROM usuario WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $fila = $result->fetch_assoc();

        if (password_verify($contra, $fila["contra"])) {
            session_start();
            $_SESSION['id_usu'] = $fila['id_usu'];
            $_SESSION['nombre_usuario'] = $fila['nombre'];
            
            return true;
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

function registroUsuario($contra, $usuario, $fecha, $nombre, $apellidos) {
    global $conn;

    // Verificar si el usuario ya existe
   // Definir la consulta SQL con un marcador de posición (?)
   $sql_check = "SELECT usuario FROM usuario WHERE usuario = ?";  

   // Preparar la consulta para evitar inyecciones SQL
   $stmt_check = $conn->prepare($sql_check);  

   // Vincular el parámetro con el valor de la variable $usuario
   // "s" indica que el valor es de tipo string (cadena de texto)
   $stmt_check->bind_param("s", $usuario);  

   // Ejecutar la consulta preparada
   $stmt_check->execute();  

   // Almacenar el resultado de la consulta en el objeto $stmt_check
   $stmt_check->store_result();  


    if ($stmt_check->num_rows > 0) {
        $stmt_check->close();
        return false; // Usuario ya existe
    }
    $stmt_check->close();

    // Hashear la contraseña antes de guardarla
    $contraHash = password_hash($contra, PASSWORD_BCRYPT);

    // Insertar nuevo usuario
    $sql = "INSERT INTO usuario (fecha_nacimiento, nombre, apellidos, usuario, contra) 
            VALUES (?, ?, ?, ?, ?)";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $fecha, $nombre, $apellidos, $usuario, $contraHash);

    if ($stmt->execute()) {
        return $stmt->insert_id; // Devuelve el ID del usuario recién creado
    } else {
        return false; // Error en el registro
    }
}
function anadir($tipo_comida, $gl_1h, $rac, $insu, $gl_2h, $id_usu, $fecha) {
    global $conn;

    // Verificar si la sesión tiene los valores necesarios
    $fecha = isset($_SESSION['fecha']) ? $_SESSION['fecha'] : null;
    $id_usu = isset($_SESSION['id_usu']) ? $_SESSION['id_usu'] : null;

    // Insertar en la tabla comida
    $sql = "INSERT INTO comida (tipo_comida, gl_1h, raciones, insulina, gl_2h, fecha, id_usu) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssss", $tipo_comida, $gl_1h, $rac, $insu, $gl_2h, $fecha, $id_usu);

    if ($stmt->execute()) {
        $id_comida = $stmt->insert_id; // Obtener ID de la comida recién insertada

        // Si el usuario seleccionó hipoglucemia o hiperglucemia, insertar en la tabla correspondiente

        return $id_comida;
    } else {
        return false; // Error en el registro
    }
}

?>  
