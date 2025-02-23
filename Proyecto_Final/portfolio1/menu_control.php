<?php
include 'db.php'; // Incluir la conexión

$result = $conn->query("SELECT * FROM controles");

echo "<a href='anadir_control.php'>Añadir Paciente</a>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Paciente_id</th>
<th>Fecha</th>
<th>Glucosa</th>
<th>Presion</th>
<th>Observaciones</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['paciente_id']}</td>
    <td>{$row['fecha']}</td>
    <td>{$row['glucosa']}</td>
    <td>{$row['presion']}</td>
    <td>{$row['observaciones']}</td>
    <td>
        <a href='modificar_control.php?id={$row['id']}'>Modificar</a> |
        <a href='borrar_control.php?id={$row['id']}'>Borrar</a>
    </td>
    </tr>";
}

echo "</table>";
echo "<a href='menu.php'>Menu usuarios</a>";

?>
