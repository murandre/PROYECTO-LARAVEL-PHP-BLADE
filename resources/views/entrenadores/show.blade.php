@extends('plantilla')

@section('titulo', 'Detalles del Entrenador')

@section('contenido')
    <div class="container">
        <h1>Detalles del Entrenador</h1>
        <p>Nombre: {{ $entrenador->nombre }}</p>
        <p>Apellido: {{ $entrenador->apellido }}</p>
        <p>Especialidad: {{ $entrenador->especialidad }}</p>
        <p>Email: {{ $entrenador->email }}</p>
        <p>Teléfono: {{ $entrenador->telefono }}</p>
        <p>Fecha de Contratación: {{ $entrenador->fecha_contratacion }}</p>
        <p>Activo: {{ $entrenador->activo ? 'Sí' : 'No' }}</p>
        <a href="{{ route('entrenadores.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('entrenadores.edit', $entrenador) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('entrenadores.destroy', $entrenador) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
