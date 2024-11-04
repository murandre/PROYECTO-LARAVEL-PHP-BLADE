@extends('plantilla')

@section('titulo', 'Detalle del Equipo')

@section('contenido')
    <div class="container">
        <h1>Detalles del Equipo</h1>
        <p><strong>Nombre:</strong> {{ $equipo->nombre }}</p>
        <p><strong>Descripción:</strong> {{ $equipo->descripcion }}</p>
        <p><strong>Cantidad:</strong> {{ $equipo->cantidad }}</p>
        <p><strong>Disponible:</strong> {{ $equipo->disponible ? 'Sí' : 'No' }}</p>
        <a href="{{ route('equipos.index') }}" class="btn btn-secondary">Volver</a>
        <a href="{{ route('equipos.edit', $equipo) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('equipos.destroy', $equipo) }}" method="POST" style="display:inline-block;">
            @csrf
            @method('DELETE')
        </form>
    </div>
@endsection
