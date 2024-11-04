@extends('plantilla')

@section('titulo', 'Crear Pago')

@section('contenido')
    <div class="container">
        <h1>Crear Pago</h1>
        <form action="{{ route('pagos.store') }}" method="POST">
            @include('pagos._form')
        </form>
    </div>
@endsection
