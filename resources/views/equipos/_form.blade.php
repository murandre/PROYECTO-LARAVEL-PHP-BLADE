@csrf

<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $equipo->nombre ?? '') }}">
    @error('nombre')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="descripcion">Descripción:</label>
    <textarea id="descripcion" name="descripcion" class="form-control">{{ old('descripcion', $equipo->descripcion ?? '') }}</textarea>
    @error('descripcion')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" class="form-control" value="{{ old('cantidad', $equipo->cantidad ?? '') }}">
    @error('cantidad')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="disponible">Disponible:</label>
    <input type="hidden" name="disponible" value="0">
    <input type="checkbox" id="disponible" name="disponible" value="1" {{ old('disponible', $equipo->disponible) ? 'checked' : '' }}>
    @error('disponible')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
