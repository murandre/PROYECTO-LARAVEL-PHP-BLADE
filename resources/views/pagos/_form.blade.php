@csrf

<div class="form-group">
    <label for="monto">Monto:</label>
    <div class="input-group">
        <span class="input-group-text">$</span>
        <input type="text" id="monto" name="monto" class="form-control" value="{{ old('monto', $pago->monto ?? '') }}" required>
    </div>
    @error('monto')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="fecha_pago">Fecha de Pago:</label>
    <input type="date" id="fecha_pago" name="fecha_pago" class="form-control" value="{{ old('fecha_pago', $pago->fecha_pago ?? '') }}" required>
    @error('fecha_pago')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="metodo_pago">Método de Pago:</label>
    <select name="metodo_pago" id="metodo_pago" class="form-control" required>
        <option value="">Seleccione el método de pago</option>
        <option value="Credito" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'Credito' ? 'selected' : '' }}>Credito</option>
        <option value="Debito" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'Debito' ? 'selected' : '' }}>Debito</option>
        <option value="Transferencia" {{ old('metodo_pago', $pago->metodo_pago ?? '') == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
    </select>
    @error('metodo_pago')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="confirmado">Confirmado:</label>
    <input type="hidden" name="confirmado" value="0">
    <input type="checkbox" id="confirmado" name="confirmado" value="1" {{ old('confirmado', $pago->confirmado ?? false) ? 'checked' : '' }}>
    @error('confirmado')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="socio_id">Socio:</label>
    <select id="socio_id" name="socio_id" class="form-control" required>
        @foreach ($socios as $socio)
            <option value="{{ $socio->id }}" {{ old('socio_id', $pago->socio_id ?? '') == $socio->id ? 'selected' : '' }}>
                {{ $socio->id }} - {{ $socio->nombre }} {{ $socio->apellido }}
            </option>
        @endforeach
    </select>
    @error('socio_id')
        <div class="error">{{ $message }}</div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">Guardar</button>
