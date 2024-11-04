@extends('plantilla')

@section('titulo', 'Crear Equipo')

@section('contenido')
    <h1>Crear Equipo</h1>
    <form action="{{ route('equipos.store') }}" method="POST">
        @include('equipos._form')
    </form>
@endsection
