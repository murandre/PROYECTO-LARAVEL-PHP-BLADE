<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscripciones extends Model
{
    use HasFactory;
    public function socio()
{
    return $this->belongsTo(Socio::class, 'socio_id');
}
}
