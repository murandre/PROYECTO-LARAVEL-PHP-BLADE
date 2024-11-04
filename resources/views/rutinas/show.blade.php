<!-- resources/views/rutinas/show.blade.php -->
@extends('plantilla')

@section('titulo', 'Detalles de la rutina')

@section('contenido')
    <div class="container">
        <h1>{{ $rutina->nombre }}</h1>
        <p><strong>Descripción:</strong> {{ $rutina->descripcion }}</p>
        <p><strong>Dificultad:</strong> {{ $rutina->dificultad }}</p>
        <p><strong>Entrenador:</strong> {{ $rutina->entrenador->nombre }}</p>
        <a href="{{ route('rutinas.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('rutinas.edit', $rutina) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('rutinas.destroy', $rutina) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
