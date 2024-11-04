@extends('plantilla')

@section('titulo', 'Detalles de las inscripciones')

@section('contenido')
    <div class="container">
        <h1>Detalle de Inscripciones</h1>

        <!-- Verifica si hay inscripciones disponibles -->
        @if(empty($v_inscripciones_detalle))
            <p>No hay inscripciones para mostrar.</p>
        @else
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Tipo</th>
                        <th>Activo</th>
                        <th>Nombre del Socio</th>
                        <th>Apellido del Socio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($v_inscripciones_detalle as $inscripcion)
                        <tr>
                            <td>{{ $inscripcion->id }}</td>
                            <td>{{ $inscripcion->fecha_inicio }}</td>
                            <td>{{ $inscripcion->fecha_fin }}</td>
                            <td>{{ $inscripcion->tipo }}</td>
                            <td>{{ $inscripcion->activo }}</td>
                            <td>{{ $inscripcion->nombre }}</td>
                            <td>{{ $inscripcion->apellido }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
