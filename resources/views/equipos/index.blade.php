@extends('plantilla')

@section('titulo', 'Lista de Equipos')

@section('contenido')
    <div class="container">
        <h1>Lista de Equipos</h1>
        <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Crear nuevo equipo</a>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Cantidad</th>
                    <th>Disponible</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($equipos as $equip)
                    <tr>
                        <td>{{ $equip->nombre }}</td>
                        <td>{{ $equip->descripcion }}</td>
                        <td>{{ $equip->cantidad }}</td>
                        <td>{{ $equip->disponible ? 'Sí' : 'No' }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('equipos.show', $equip) }}" class="btn btn-info d-inline">Ver</a>
                                <a href="{{ route('equipos.edit', $equip) }}" class="btn btn-warning d-inline">Editar</a>
                                <form action="{{ route('equipos.destroy', $equip) }}" method="POST" style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger d-inline" onclick="return confirm('¿Estás seguro de eliminar este equipo?')">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
