 @extends('layouts.master')

@section('content')
<div class="container text-center">
    <h1>Menu Principal</h1>
    <p>Selecciona alguna de las 3 siguientes opciones:</p>

    <div class="row justify-content-center">
        <div>
            <a href="{{ route('catalog.persona') }}" class="btn btn-primary btn-lg btn-block">
                Buscar
            </a>
        </div>
        <div>
            <a href="{{ route('catalog.imagen') }}" class="btn btn-success btn-lg btn-block">
                Tabla
            </a>
        </div>
        <div>
            <a href="{{ route('catalog.agenda') }}" class="btn btn-warning btn-lg btn-block">
                Insertar
            </a>
        </div>
    </div>
</div>
@endsection 
