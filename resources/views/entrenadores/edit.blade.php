@extends('plantilla')

@section('titulo', 'Editar Entrenador')

@section('contenido')
    <div class="container">
        <h1>Editar Entrenador</h1>
        <form action="{{ route('entrenadores.update', $entrenador) }}" method="POST">
            @csrf
            @method('PATCH')
            @include('entrenadores._form')
        </form>
    </div>
@endsection


