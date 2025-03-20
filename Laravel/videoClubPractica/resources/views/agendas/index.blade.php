@extends('layouts.master')

@section('content')
<div class="container text-center">
    <h1>Bienvenido al Catálogo de Pictogramas</h1>
    <p>Selecciona una de las siguientes opciones:</p>

    <div class="row justify-content-center">
        <div class="col-md-4">
            <a href="{{ route('personas.index') }}" class="btn btn-primary btn-lg btn-block">
                📜 Ver Personas
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('imagenes.index') }}" class="btn btn-success btn-lg btn-block">
                🖼️ Ver Imágenes
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('agenda.index') }}" class="btn btn-warning btn-lg btn-block">
                📅 Ver Agenda
            </a>
        </div>
    </div>
</div>  
@endsection
