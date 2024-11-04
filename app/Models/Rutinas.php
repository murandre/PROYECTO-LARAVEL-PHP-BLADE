<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rutinas extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'descripcion', 'dificultad', 'entrenador_id',
    ];

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class);
    }
}
