@extends('plantilla')

@section('titulo', 'Editar Pago')

@section('contenido')
    <div class="container">
        <h1>Editar Pago</h1>
        <form action="{{ route('pagos.update', $pago) }}" method="POST">
            @csrf
            @method('PATCH')
            @include('pagos._form')
        </form>
    </div>
@endsection



