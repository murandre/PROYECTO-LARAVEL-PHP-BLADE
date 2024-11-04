@extends('plantilla')

@section('titulo', 'Crear Inscripción')

@section('contenido')
    <div class="container">
        <h1>Crear Inscripcion</h1>
        <form action="{{ route('inscripciones.store') }}" method="POST">
            @include('inscripciones._form')
        </form>
    </div>
@endsection



