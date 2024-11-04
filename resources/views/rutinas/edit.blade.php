<!-- resources/views/rutinas/edit.blade.php -->
@extends('plantilla')

@section('titulo', 'Editar Entrenador')

@section('contenido')
    <div class="container">
        <h1>Editar Rutina</h1>
        <form action="{{ route('rutinas.update', $rutina) }}" method="POST">
            @csrf
            @method('PATCH')
            @include('rutinas._form')
        </form>
    </div>
@endsection
