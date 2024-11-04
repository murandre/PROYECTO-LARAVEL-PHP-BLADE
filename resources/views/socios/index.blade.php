@extends('plantilla')

@section('titulo', 'Lista de Socios')

@section('contenido')
    <div class="container">
        <h1>Lista de Socios</h1>
        <a href="{{ route('socios.create') }}" class="btn btn-primary mb-3">Crear Nuevo Socio</a>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Activo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($socios as $socio)
                    <tr>
                        <td>{{ $socio->nombre }}</td>
                        <td>{{ $socio->apellido }}</td>
                        <td>{{ $socio->fecha_nacimiento }}</td>
                        <td>{{ $socio->email }}</td>
                        <td>{{ $socio->telefono }}</td>
                        <td>{{ $socio->direccion }}</td>
                        <td>{{ $socio->activo ? 'Sí' : 'No' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('socios.show', $socio) }}" class="btn btn-info d-inline">Ver</a>
                                <a href="{{ route('socios.edit', $socio) }}" class="btn btn-warning d-inline">Editar</a>
                                <form action="{{ route('socios.destroy', $socio) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline" onclick="return confirm('¿Estás seguro de eliminar este socio?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
