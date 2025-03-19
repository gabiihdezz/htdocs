@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Imágenes</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Descripción</th>
            </tr>
        </thead>
        <tbody>
            @foreach($imagenes as $imagen)
                <tr>
                    <td>{{ $imagen->idimagen }}</td>
                    <td>{{ $imagen->categoria }}</td>
                    <td><img src="{{ asset('imagenes/' . $imagen->imagen) }}" width="100"></td>
                    <td>{{ $imagen->descripcion }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
