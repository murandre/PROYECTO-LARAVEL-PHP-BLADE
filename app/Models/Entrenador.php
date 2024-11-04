<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrenador extends Model
{
    use HasFactory;

    // Especifica explícitamente el nombre de la tabla
    protected $table = 'entrenadores';

    protected $fillable = [
        'nombre', 'apellido', 'especialidad', 'email', 'telefono', 'activo',
    ];

    // Accessor para asegurar que solo la primera letra del nombre esté en mayúscula y el resto en minúsculas
    public function getNombreAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // Accessor para asegurar que solo la primera letra del apellido esté en mayúscula y el resto en minúsculas
    public function getApellidoAttribute($value)
    {
        return ucfirst(strtolower($value));
    }

    // Mutator para almacenar el teléfono con "~" al inicio y al final
    public function setTelefonoAttribute($value)
    {
        $this->attributes['telefono'] = '~' . $value . '~';
    }
}
