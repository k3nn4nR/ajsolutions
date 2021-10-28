<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdeletes;

class EvaluacionesCabecera extends Model
{
    use softdeletes;
    protected $fillable = ['evaluacion_id','trabajador_dni'];
    protected $guarded = ['id'];

    public function detalles()
    {
        return $this->hasMany('App\EvaluacionesDetalle','evaluaciones_cabeceras_id');
    }

    public function trabajador()
    {
        return $this->belongsTo('App\Trabajador','trabajador_dni');
    }

    public function evaluacion()
    {
        return $this->belongsTo('App\Evaluacion','evaluacion_id');
    }
}
