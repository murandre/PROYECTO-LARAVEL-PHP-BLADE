@csrf

<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $entrenador->nombre ?? '') }}" required>
    @error('nombre')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido', $entrenador->apellido ?? '') }}" required>
    @error('apellido')
        <div class="error">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="especialidad">Especialidad</label>
    <select name="especialidad" id="especialidad" class="form-control" required>
        <option value="">Seleccione la especialidad</option>
        <option value="Fácil" {{ old('especialidad', $entrenador->especialidad ?? '') == 'Entrenamiento funcional' ? 'selected' : '' }}>Entrenamiento Funcional</option>
        <option value="Mediano" {{ old('especialidad',$entrenador->especialidad ?? '') == 'Musculacion' ? 'selected' : '' }}>Musculacion</option>
        <option value="Difícil" {{ old('especialidad', $entrenador->especialidad ?? '') == 'Entrenamiento deportivo especifico' ? 'selected' : '' }}>Entrenamiento deportivo especifico</option>
        <option value="Difícil" {{ old('especialidad', $entrenador->especialidad ?? '') == 'Yoga y Pilates' ? 'selected' : '' }}>Yoga y Pilates</option>
        <option value="Difícil" {{ old('especialidad', $entrenador->especialidad ?? '') == 'Cardio y Resistencia' ? 'selected' : '' }}>Cardio y Resistencia</option>
    </select>
</div>


<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $entrenador->email ?? '') }}" required>
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $entrenador->telefono ?? '') }}" required>
    @error('telefono')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_contratacion">Fecha de Contratación:</label>
    <input type="date" id="fecha_contratacion" name="fecha_contratacion" class="form-control" value="{{ old('fecha_contratacion', $entrenador->fecha_contratacion ?? '') }}" required>
    @error('fecha_contratacion')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="activo">Activo:</label>
    <input type="hidden" name="activo" value="0">
    <input type="checkbox" id="activo" name="activo" value="1" {{ old('activo', $entrenador->activo) ? 'checked' : '' }}>
    @error('activo')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
