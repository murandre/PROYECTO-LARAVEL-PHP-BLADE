@extends('plantilla')

@section('titulo', 'Crear Socio')

@section('contenido')
    <div class="container">
        <h1>Crear Socio</h1>
        <form action="{{ route('socios.store') }}" method="POST">
            @include('socios._form')
        </form>
    </div>
@endsection
