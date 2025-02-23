<?php
include 'db.php'; // Incluir la conexión

$result = $conn->query("SELECT * FROM pacientes");

echo "<a href='anadir.php'>Añadir Paciente</a>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Edad</th>
<th>Diagnóstico</th>
<th>Acciones</th>
</tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>
    <td>{$row['id']}</td>
    <td>{$row['nombre']}</td>
    <td>{$row['edad']}</td>
    <td>{$row['diagnostico']}</td>
    <td>
        <a href='modificar.php?id={$row['id']}'>Modificar</a> |
        <a href='borrar.php?id={$row['id']}'>Borrar</a>
    </td>
    </tr>";
}

echo "</table>";
echo "<a href='menu_control.php'>Menu Control</a>";

?>
