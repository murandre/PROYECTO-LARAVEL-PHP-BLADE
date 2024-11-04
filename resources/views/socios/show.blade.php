@extends('plantilla')

@section('titulo', 'Detalles del Socio')

@section('contenido')
    <div class="container">
        <h1>Detalles del Socio</h1>
        <p>Nombre: {{ $socio->nombre }}</p>
        <p>Apellido: {{ $socio->apellido }}</p>
        <p>Fecha de Nacimiento: {{ $socio->fecha_nacimiento }}</p>
        <p>Email: {{ $socio->email }}</p>
        <p>Teléfono: {{ $socio->telefono }}</p>
        <p>Dirección: {{ $socio->direccion }}</p>
        <p>Activo: {{ $socio->activo ? 'Sí' : 'No' }}</p>
        <a href="{{ route('socios.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('socios.edit', $socio) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('socios.destroy', $socio) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
            </form>
    </div>
@endsection
