@csrf

<div class="form-group">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" class="form-control" value="{{ old('nombre', $socio->nombre ?? '') }}">
    @error('nombre')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" class="form-control" value="{{ old('apellido', $socio->apellido ?? '') }}">
    @error('apellido')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control" value="{{ old('fecha_nacimiento', $socio->fecha_nacimiento ?? '') }}">
    @error('fecha_nacimiento')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" class="form-control" value="{{ old('email', $socio->email ?? '') }}">
    @error('email')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="telefono">Teléfono:</label>
    <input type="text" id="telefono" name="telefono" class="form-control" value="{{ old('telefono', $socio->telefono ?? '') }}">
    @error('telefono')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" class="form-control" value="{{ old('direccion', $socio->direccion ?? '') }}">
    @error('direccion')
        <div class="error">{{ $message }}</div>
    @enderror
</div>


<div class="form-group">
    <label for="activo">Activo:</label>
    <input type="hidden" name="activo" value="0">
    <input type="checkbox" id="activo" name="activo" value="1" {{ old('activo', $socio->activo) ? 'checked' : '' }}>
    @error('activo')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
