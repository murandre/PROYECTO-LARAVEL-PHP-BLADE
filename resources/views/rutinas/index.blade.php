@extends('plantilla')

@section('titulo', 'Lista de Rutinas')

@section('contenido')
    <div class="container">
        <h1>Rutinas</h1>
        <a href="{{ route('rutinas.create') }}" class="btn btn-primary mb-3">Crear Rutina</a>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Dificultad</th>
                    <th>Entrenador</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rutinas as $rutina)
                    <tr>
                        <td>{{ $rutina->nombre }}</td>
                        <td>{{ $rutina->descripcion }}</td>
                        <td>{{ $rutina->dificultad }}</td>
                        <td>{{ $rutina->entrenador->nombre ?? 'N/A' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('rutinas.show', $rutina) }}" class="btn btn-info d-inline">Ver</a>
                                <a href="{{ route('rutinas.edit', $rutina) }}" class="btn btn-warning d-inline">Editar</a>
                                <form action="{{ route('rutinas.destroy', $rutina) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline" onclick="return confirm('¿Estás seguro de eliminar esta rutina?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
