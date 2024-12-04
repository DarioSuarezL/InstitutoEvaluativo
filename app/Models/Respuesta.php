<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Respuesta extends Model
{
    protected $table = 'respuestas';
    protected $fillable = [
        'descripcion',
        'correcta',
        'pregunta_id'
    ];
}
