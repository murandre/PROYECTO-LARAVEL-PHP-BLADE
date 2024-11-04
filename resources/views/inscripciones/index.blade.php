@extends('plantilla')

@section('titulo', 'Lista de Inscripciones')

@section('contenido')
    <div class="container">
        <h1>Lista de Inscripciones</h1>
        <a href="{{ route('inscripciones.create') }}" class="btn btn-primary mb-3">Crear nueva inscripción</a>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                    <th>Tipo</th>
                    <th>Activo</th>
                    <th>ID del Socio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inscripciones as $inscripcion)
                    <tr>
                        <td>{{ $inscripcion->fecha_inicio }}</td>
                        <td>{{ $inscripcion->fecha_fin }}</td>
                        <td>{{ $inscripcion->tipo }}</td>
                        <td>{{ $inscripcion->activo ? 'Sí' : 'No' }}</td>
                        <td>{{ $inscripcion->socio_id }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('inscripciones.show', $inscripcion) }}" class="btn btn-info d-inline">Ver</a>
                                <a href="{{ route('inscripciones.edit', $inscripcion) }}" class="btn btn-warning d-inline">Editar</a>
                                <form action="{{ route('inscripciones.destroy', $inscripcion) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline" onclick="return confirm('¿Estás seguro de eliminar esta inscripción?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
