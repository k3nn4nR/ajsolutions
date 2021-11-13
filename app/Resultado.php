<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    protected $fillable = ['evaluacion_id', 'factor_id', 'resultado', 'valor_minimo', 'valor_maximo'];
    public $timestamps = false;
}
