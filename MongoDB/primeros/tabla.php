<?php

$servidor = "localhost:8080";
$usuario = "root";
$contrasena = "";

$conn = new mysqli ( $servidor, $usuario, $contrasena);

if ( $conn -> connect_error){
    die ("Conexion fallida: ". $conn -> connect_error);
}

$nombre_bd='miBaseDeDatos';
$conn->select_db($nomrbe_bd);

/*$sql = "CREATE TABLE IF NOT EXISTS empleados(
    CodEmple INT AUTO_INCREMENT"
*/



/* empleados (tabla de 50 empleados con nombres y departamento) */

$stmt = $conn->prepare("INSERT INTO empleados (Nombre, Apellidio1, Apellido2, Departamento) VALUES (?,?,?,?)");


foreach ($empleados as $empleado){
    $stmt ->bind_param("ssss", $empleado[0], $empleado[1], $empleado[2], $empleado[3]);
    if($stmt->execute()){
        echo "Empleado " . $empleado[0]. " " . $empleado[1]. " " . $empleado[2]. ", insertado correctamente " .$empleado[3];
    }
    else{
        echo "Error al insertar el empleado:  " . $empleado[0]. " " . $empleado[1]. " " . $empleado[2]. ", .\n " .$empleado[3];
        
    }
}

$stmt->close();
?>
