@extends('plantilla')

@section('titulo', 'Detalles de la Inscripción')

@section('contenido')
    <div class="container">
        <h1>Detalles de la Inscripción</h1>
        <p><strong>Fecha de Inicio:</strong> {{ $inscripcion->fecha_inicio }}</p>
        <p><strong>Fecha de Fin:</strong> {{ $inscripcion->fecha_fin }}</p>
        <p><strong>Tipo:</strong> {{ $inscripcion->tipo }}</p>
        <p><strong>Activo:</strong> {{ $inscripcion->activo ? 'Sí' : 'No' }}</p>
        <p><strong>ID del Socio:</strong> {{ $inscripcion->socio_id }}</p>
        <a href="{{ route('inscripciones.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('inscripciones.edit', $inscripcion ) }}" class="btn btn-warning">Editar</a>

    </div>
@endsection
