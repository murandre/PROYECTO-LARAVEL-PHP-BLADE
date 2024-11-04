@csrf

<div class="form-group">
    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" value="{{ old('fecha_inicio', $inscripcion->fecha_inicio ?? '') }}" required>
    @error('fecha_inicio')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" value="{{ old('fecha_fin', $inscripcion->fecha_fin ?? '') }}" required>
    @error('fecha_fin')
        <div class="error">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="tipo">Tipo:</label>
    <select name="tipo" id="tipo" class="form-control" required>
        <option value="">Seleccione el tipo de inscripcion</option>
        <option value="Semanal" {{ old('Semanal', $inscripcion->Semanal ?? '') == 'Semanal' ? 'selected' : '' }}>Semanal</option>
        <option value="Mensual" {{ old('Mensual', $inscripcion->Mensual ?? '') == 'Mensual' ? 'selected' : '' }}>Mensual</option>
        <option value="Anual" {{ old('Anual', $inscripcion->Anual ?? '') == 'Anual' ? 'selected' : '' }}>Anual</option>
    </select>
</div>

<div class="form-group">
    <label for="activo">Activo:</label>
    <input type="hidden" name="activo" value="0">
    <input type="checkbox" id="activo" name="activo" value="1" {{ old('activo', $inscripcion->activo ?? false) ? 'checked' : '' }}>
    @error('activo')
        <div class="error">{{ $message }}</div>
    @enderror
</div>



<div class="form-group">
    <label for="socio_id">Socio:</label>
    <select id="socio_id" name="socio_id" class="form-control" required>
        @foreach ($socios as $socio)
            <option value="{{ $socio->id }}" {{ old('socio_id', $inscripcion->socio_id ?? '') == $socio->id ? 'selected' : '' }}>
                {{ $socio->id }} - {{ $socio->nombre }} {{ $socio->apellido }}
            </option>
        @endforeach
    </select>
    @error('socio_id')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
