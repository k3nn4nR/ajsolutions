<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EvaluacionesCabecera extends Model
{
    use SoftDeletes;
    protected $fillable = ['evaluacion_id','trabajador_dni','estado','hora','fecha'];
    protected $guarded = ['id'];
    public $timestamps = false;

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
