@extends('plantilla')

@section('titulo', 'Editar Equipo')


@section('contenido')
    <h1>Editar Equipo</h1>
    <form action="{{ route('equipos.update', $equipo->id) }}" method="POST">
        @csrf
        @method('PATCH')
        @include('equipos._form')
    </form>
@endsection
