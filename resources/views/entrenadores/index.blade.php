@extends('plantilla')

@section('titulo', 'Lista de Entrenadores')

@section('contenido')
    <div class="container">
        <h1>Lista de Entrenadores</h1>
        <a href="{{ route('entrenadores.create') }}" class="btn btn-primary mb-3">Crear nuevo entrenador</a>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Especialidad</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Fecha de Contratación</th> <!-- Nueva columna añadida -->
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($entrenadores as $entrenador)
                    <tr>
                        <td>{{ $entrenador->nombre }}</td>
                        <td>{{ $entrenador->apellido }}</td>
                        <td>{{ $entrenador->especialidad }}</td>
                        <td>{{ $entrenador->email }}</td>
                        <td>{{ $entrenador->telefono }}</td>
                        <td>{{ $entrenador->fecha_contratacion }}</td> <!-- Mostrar la fecha de contratación -->
                        <td>{{ $entrenador->activo ? 'Sí' : 'No' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('entrenadores.show', $entrenador) }}" class="btn btn-info d-inline">Ver</a>
                                <a href="{{ route('entrenadores.edit', $entrenador) }}" class="btn btn-warning d-inline">Editar</a>
                                <form action="{{ route('entrenadores.destroy', $entrenador) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline" onclick="return confirm('¿Estás seguro de eliminar este entrenador?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
