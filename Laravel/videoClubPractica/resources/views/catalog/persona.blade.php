<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Entrada</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Buscar Entrada</h1>

        <form action="{{ route('agenda.search') }}" method="GET">
            @csrf
            <input type="date" name="fecha" required>
            <select name="idpersona" required>
                @foreach($personas as $persona)
                    <option value="{{ $persona->idpersona }}">{{ $persona->nombre }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
            <button type="submit">Mostrar Agenda</button>
        </form>

        @if(isset($agendas))
            <h2>Resultados de la búsqueda:</h2>
            <table>
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Imagen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($agendas as $agenda)
                        <tr>
                            <td>{{ $agenda->fecha }}</td>
                            <td>{{ $agenda->hora }}</td>
                            <td><img src="{{ asset($agenda->imagen->imagen) }}" alt="{{ $agenda->imagen->descripcion }}" width="100"></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('catalog.agenda') }}">Añadir</a>
        <a href="{{ route('catalog.imagen') }}">Tabla</a>
    </div>
</body>
</html>
