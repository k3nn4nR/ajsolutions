<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    use SoftDeletes;
    protected $table = "evaluaciones";
    protected $fillable = ['evaluacion'];

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }
}
