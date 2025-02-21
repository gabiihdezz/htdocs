<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Control de Insulina</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 5px;
            text-align: center;
        }
        th {
            background-color: lightgreen;
        }
        .hipo, .hiper {
            background-color: lightblue;
        }
        .correccion {
            background-color: lightyellow;
        }
        .lenta {
            background-color: lightcoral;
        }
    </style>
</head>
<body>
    <h2>Tabla de Control de Insulina</h2>
    <table>
        <tr>
            <th rowspan="2">Día</th>
            <th colspan="5">Desayuno</th>
            <th colspan="5">Comida</th>
            <th colspan="5">Cena</th>
            <th rowspan="2" class="lenta">Lenta</th>
        </tr>
        <tr>
            <th>GL/1H</th><th>RAC</th><th>INSUL.</th><th>GL/2H</th><th class="hipo">HIPO</th>
            <th>GL/1H</th><th>RAC</th><th>INSUL.</th><th>GL/2H</th><th class="hipo">HIPO</th>
            <th>GL/1H</th><th>RAC</th><th>INSUL.</th><th>GL/2H</th><th class="hipo">HIPO</th>
        </tr>
        <!-- Filas de días -->
        <script>
            for (let i = 1; i <= 17; i++) {
                document.write("<tr>");
                document.write(`<td>Día ${i}</td>`);
                for (let j = 0; j < 3; j++) {
                    document.write("<td></td><td></td><td></td><td></td><td class='hipo'></td>");
                }
                document.write("<td class='lenta'></td>");
                document.write("</tr>");
            }
        </script>
    </table>
</body>
</html>
