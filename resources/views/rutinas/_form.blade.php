<!-- resources/views/rutinas/_form.blade.php -->
@csrf
<div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre', $rutina->nombre ?? '') }}" required>
</div>

<div class="form-group">
    <label for="descripcion">Descripción</label>
    <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion', $rutina->descripcion ?? '') }}" >
</div>

<div class="form-group">
    <label for="dificultad">Dificultad</label>
    <select name="dificultad" id="dificultad" class="form-control" required>
        <option value="">Seleccione la dificultad</option>
        <option value="Fácil" {{ old('dificultad', $rutina->dificultad ?? '') == 'Fácil' ? 'selected' : '' }}>Fácil</option>
        <option value="Mediano" {{ old('dificultad', $rutina->dificultad ?? '') == 'Mediano' ? 'selected' : '' }}>Mediano</option>
        <option value="Difícil" {{ old('dificultad', $rutina->dificultad ?? '') == 'Difícil' ? 'selected' : '' }}>Difícil</option>
    </select>
</div>

<div class="form-group">
    <label for="entrenador_id">Entrenador</label>
    <select name="entrenador_id" id="entrenador_id" class="form-control" required>
        @foreach($entrenadores as $entrenador)
            <option value="{{ $entrenador->id }}" {{ (old('entrenador_id') ?? $rutina->entrenador_id ?? '') == $entrenador->id ? 'selected' : '' }}>
                {{ $entrenador->nombre }}
            </option>
        @endforeach
    </select>
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
