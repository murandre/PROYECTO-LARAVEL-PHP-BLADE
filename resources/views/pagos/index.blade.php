@extends('plantilla')

@section('titulo', 'Lista de Pagos')

@section('contenido')
    <div class="container">
        <h1>Lista de Pagos</h1>
        <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Crear Pago</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Monto</th>
                    <th>Fecha de Pago</th>
                    <th>Método de Pago</th>
                    <th>Confirmado</th>
                    <th>Socio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                    <tr>
                        <td>{{ $pago->id }}</td>
                        <td>{{ $pago->monto }}</td>
                        <td>{{ $pago->fecha_pago }}</td>
                        <td>{{ $pago->metodo_pago }}</td>
                        <td>{{ $pago->confirmado ? 'Sí' : 'No' }}</td>
                        <td>{{ $pago->socio_id }}</td>
                        <td>
                            <a href="{{ route('pagos.show', $pago) }}" class="btn btn-info">Ver</a>
                            <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar este pago?')">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
