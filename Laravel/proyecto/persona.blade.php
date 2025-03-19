@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Listado de Personas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Edad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($personas as $persona)
                <tr>
                    <td>{{ $persona->idpersona }}</td>
                    <td>{{ $persona->nombre }}</td>
                    <td>{{ $persona->apellidos }}</td>
                    <td>{{ $persona->edad }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
