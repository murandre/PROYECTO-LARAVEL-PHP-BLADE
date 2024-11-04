@extends('plantilla')

@section('titulo', 'Editar Inscripción')

@section('contenido')
    <div class="container">
        <h1>Editar Inscripción</h1>
        <form action="{{ route('inscripciones.update', $inscripcion->id) }}" method="POST">
            @csrf
            @method('PATCH')
            @include('inscripciones._form', ['inscripcion' => $inscripcion, 'socios' => $socios])
        </form>
    </div>
@endsection
