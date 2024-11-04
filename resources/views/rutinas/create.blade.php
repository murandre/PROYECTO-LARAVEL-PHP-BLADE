<!-- resources/views/rutinas/create.blade.php -->
@extends('plantilla')

@section('titulo', 'Crear Rutina')

@section('contenido')
    <div class="container">
        <h1>Crear Rutina</h1>
        <form action="{{ route('rutinas.store') }}" method="POST">
            @include('rutinas._form')
        </form>
    </div>
@endsection
