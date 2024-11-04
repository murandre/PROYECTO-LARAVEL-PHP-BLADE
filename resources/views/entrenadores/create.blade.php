@extends('plantilla')

@section('titulo', 'Crear Entrenador')

@section('contenido')
    <div class="container">
        <h1>Crear Entrenador</h1>
        <form action="{{ route('entrenadores.store') }}" method="POST">
            @include('entrenadores._form')
        </form>
    </div>
@endsection
