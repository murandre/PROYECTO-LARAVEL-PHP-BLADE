@extends('plantilla')

@section('titulo', 'Editar Socio')

@section('contenido')
    <div class="container">
        <h1>Editar Socio</h1>
        <form action="{{ route('socios.update', $socio) }}" method="POST">
            @csrf
            @method('PATCH')
            @include('socios._form')
        </form>
    </div>

@endsection

