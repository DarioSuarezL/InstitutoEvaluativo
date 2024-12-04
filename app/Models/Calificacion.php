<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Calificacion extends Model
{
    protected $table = 'calificaciones';
    protected $fillable = ['evaluacion_ejecucion_id', 'postulante_id', 'nota', 'finalizado'];

    // public function evaluacion()
    // {
    //     return $this->belongsTo(Evaluacion::class);
    // }

    // public function postulante()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
