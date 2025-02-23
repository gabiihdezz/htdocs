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
        .hipo {
            background-color: lightblue;
        }
        .lenta {
            background-color: lightcoral;
        }
    </style>
</head>
<body>

    <h2>Tabla de Control de Insulina</h2>

    <label for="mes">Selecciona el mes:</label>
    <select id="mes" onchange="generarTabla()">
        <option value="1">Enero</option>
        <option value="2">Febrero</option>
        <option value="3">Marzo</option>
        <option value="4">Abril</option>
        <option value="5">Mayo</option>
        <option value="6">Junio</option>
        <option value="7">Julio</option>
        <option value="8">Agosto</option>
        <option value="9">Septiembre</option>
        <option value="10">Octubre</option>
        <option value="11">Noviembre</option>
        <option value="12">Diciembre</option>
    </select>

    <table id="tabla">
        <thead>
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
        </thead>
        <tbody></tbody>
    </table>

    <script>
        function obtenerDiasDelMes(mes) {
            const diasPorMes = {
                1: 31, 2: 28, 3: 31, 4: 30, 5: 31, 6: 30,
                7: 31, 8: 31, 9: 30, 10: 31, 11: 30, 12: 31
            };
            return diasPorMes[mes] || 30;
        }

        function generarTabla() {
            const mes = document.getElementById("mes").value;
            const numDias = obtenerDiasDelMes(parseInt(mes));
            const tbody = document.querySelector("#tabla tbody");
            
            tbody.innerHTML = ""; // Limpiar tabla

            for (let i = 1; i <= numDias; i++) {
                const fila = document.createElement("tr");
                let contenidoFila = `<td>Día ${i}</td>`;
                
                for (let j = 0; j < 3; j++) {
                    contenidoFila += "<td></td><td></td><td></td><td></td><td class='hipo'></td>";
                }

                contenidoFila += "<td class='lenta'></td>";
                fila.innerHTML = contenidoFila;
                tbody.appendChild(fila);
            }
        }

        // Generar la tabla con el mes actual al cargar la página
        document.addEventListener("DOMContentLoaded", generarTabla);
    </script>

</body>
</html>
