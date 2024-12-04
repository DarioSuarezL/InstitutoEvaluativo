<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ejecucion extends Model
{
    protected $table = 'ejecuciones';
    protected $fillable = ['fecha_hora'];
}
