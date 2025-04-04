@extends('layouts.master')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Entrada</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Añadir Entrada</h1>

        <form action="{{ route('catalog.agenda') }}" method="POST">
    @csrf
    <!-- Campo para seleccionar persona -->
    <select name="idpersona">
        @foreach($personas as $persona)
            <option value="{{ $persona->id }}">{{ $persona->nombre }}</option>
        @endforeach
    </select>

    <!-- Campo para seleccionar imagen -->
    <select name="idimagen">
        @foreach($imagenes as $imagen)
            <option value="{{ $imagen->id }}">{{ $imagen->descripcion }}</option>
        @endforeach
    </select>

    <!-- Campo para fecha -->
    <input type="date" name="fecha" required>

    <!-- Campo para hora -->
    <input type="time" name="hora" required>

    <button type="submit">Añadir</button>
</form>

        <a href="{{ route('catalog.imagen') }}">Tabla</a>
        <a href="{{ route('catalog.persona') }}">Buscar</a>
    </div>
</body>
</html>
