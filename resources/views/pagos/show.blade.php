@extends('plantilla')

@section('titulo', 'Detalle del Pago')

@section('contenido')
    <div class="container">
        <h1>Detalle del Pago</h1>
        <div>
            <p><strong>ID:</strong> {{ $pago->id }}</p>
            <p><strong>Monto:</strong> {{ $pago->monto }}</p>
            <p><strong>Fecha de Pago:</strong> {{ $pago->fecha_pago }}</p>
            <p><strong>Método de Pago:</strong> {{ $pago->metodo_pago }}</p>
            <p><strong>Confirmado:</strong> {{ $pago->confirmado ? 'Sí' : 'No' }}</p>
            <p><strong>Socio ID:</strong> {{ $pago->socio_id }}</p>
            <a href="{{ route('pagos.index') }}" class="btn btn-secondary">Volver</a>
            <a href="{{ route('pagos.edit', $pago) }}" class="btn btn-warning">Editar</a>
            <form action="{{ route('pagos.destroy', $pago) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
            </form>
    </div>
@endsection

        