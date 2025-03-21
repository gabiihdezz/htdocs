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
            <input type="date" name="fecha" required>
            <input type="time" name="hora" required>
            <select name="idpersona" required>
                @foreach($personas as $persona)
                    <option value="{{ $persona->idpersona }}">{{ $persona->nombre }} {{ $persona->apellidos }}</option>
                @endforeach
            </select>
            <select name="idimagen" required>
                @foreach($imagenes as $imagen)
                    <option value="{{ $imagen->idimagen }}">{{ $imagen->descripcion }}</option>
                @endforeach
            </select>
            <button type="submit">Añadir</button>
        </form>

        <a href="{{ route('catalog.imagen') }}">Tabla</a>
        <a href="{{ route('catalog.persona') }}">Buscar</a>
    </div>
</body>
</html>
