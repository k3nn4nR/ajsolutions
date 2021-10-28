<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pregunta extends Model
{
    use SoftDeletes;
    protected $table = 'preguntas';
    protected $fillable = ['descripcion','evaluacion_id','factor_id'];
    protected $guarded = ['id'];

    public function evaluacion()
    {
        return $this->belongsTo('App\Evaluacion');
    }

    public function factor()
    {
        return $this->belongsTo('App\Factor');
    }
}
