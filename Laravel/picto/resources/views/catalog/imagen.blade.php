@extends('layouts.master')

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Agenda</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Tabla de Agenda</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Persona</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->fecha }}</td>
                        <td>{{ $agenda->hora }}</td>
                        <td>{{ $agenda->persona->nombre }} {{ $agenda->persona->apellidos }}</td>
                        <td><img src=" imagenes /{{ asset( $agenda->imagen->imagen) }}" alt="{{ $agenda->imagen->descripcion }}" width="100"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('catalog.agenda') }}">Añadir</a>
        <a href="{{ route('catalog.persona') }}">Buscar</a>
    </div>
</body>
</html>
