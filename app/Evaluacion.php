<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evaluacion extends Model
{
    use SoftDeletes;
    protected $table = "evaluaciones";
    protected $fillable = ['evaluacion'];
    protected $guarded = ['id'];

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }

    public function cabeceras()
    {
        return $this->hasMany('App\EvaluacionesCabecera','evaluacion_id');
    }

    public function trabajadores()
    {
        return $this->hasManyThrough('App\Trabajador', 'App\EvaluacionesCabecera','evaluacion_id','dni','id','trabajador_dni');
    }

    public function resultados()
    {
        return $this->hasMany('App\Resultado','evaluacion_id');
    }
}
