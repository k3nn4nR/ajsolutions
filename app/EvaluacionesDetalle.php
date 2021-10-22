<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionesDetalle extends Model
{
    protected $fillable = ['evaluaciones_cabeceras_id','pregunta_id','puntaje'];

    public function cabecera()
    {
        return $this->belongsTo('App\EvaluacionesCabecera','evaluaciones_cabeceras_id');
    }

    public function pregunta()
    {
        return $this->belongsTo('App\Pregunta');
    }
}
