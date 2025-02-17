
<?php
session_start();
if (isset($_SESSION['id_usu'])) {
    $id_usu = $_SESSION['id_usu'];
}
else{
    echo "La sesión ha espirado";
}
echo <<<_END
<style >
img {
    height: 300px;
    max-width: 100%;
    margin: 5px;}
</style>
_END;


?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Examen 12-12</title>
    <link rel="icon" href="util/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            text-align: center;
            background-color: aliceblue;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif,sans-serif;
        }
        button {
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
    </style>
</head>
<body>
    <div class="row">
<?php   
        $conn = new mysqli('localhost', 'root', '', 'diabetesdb',3307);
        if ($conn->connect_error) die("Fatal Error"); 

        $query = "
        SELECT usuario, nombre AS nombre
        FROM usuario
        WHERE id_usu = '".$_SESSION['id_usu']."';
        ";
    
    
    
    $result = $conn->query($query);


    if ($row = $result->fetch_assoc() ): ?>
    <div class="col-12">
    <h1>Bienvenido/a, <?php echo htmlspecialchars($row['nombre']); ?>!</h1>
        <img src="util/eladio.jpg" alt="">
        <h3>Dale don dale !</h3>
    <form action="guardarUsuario.php" method="POST">
        <p>Pa activar los anormales:</p><input type="text" name="respuesta">
        <button type="submit" name="prueba" value="<?php echo $r++; ?>">Enviar</button>
    </form>
        <a href="puntos.php"><button>Hiperglucosa</button></a>
        <a href="resultado.php"><button>Hipoglucosa</button></a>
        <?php endif;?>
        <a href="signup.php"><p>Registro:</p></a>
        <a href="login.php"><p>Login:</p></a>
        </div>
        </div>
    </body>
</html>
