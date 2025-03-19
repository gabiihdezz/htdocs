@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agenda de Personas</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Persona</th>
                <th>Imagen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->id }}</td>
                    <td>{{ $agenda->fecha }}</td>
                    <td>{{ $agenda->hora }}</td>
                    <td>{{ $agenda->persona->nombre }} {{ $agenda->persona->apellidos }}</td>
                    <td><img src="{{ asset('imagenes/' . $agenda->imagen->imagen) }}" width="100"></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
