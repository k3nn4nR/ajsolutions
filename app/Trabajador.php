<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabajador extends Model
{
    use SoftDeletes;
    protected $table = "trabajadores";
    protected $keyType  = 'string';
    protected $primaryKey = 'dni';
    protected $fillable = ['dni','user_id','ape_paterno','ape_materno','nombres','photo','direccion','celular','estado'];
    
    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto')->withPivot('estado', 'comentario','deleted_at');
    }

    public function proyectosHistorico()
    {
        return $this->belongsToMany('App\Proyecto')->withTrashed()->withPivot('estado', 'comentario','deleted_at');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function cabeceras()
    {
        return $this->hasMany('App\EvaluacionesCabecera','trabajador_dni');
    }

    public function evaluaciones()
    {
        return $this->hasManyThrough('App\Evaluacion', 'App\EvaluacionesCabecera','trabajador_dni','id','dni','evaluacion_id');
    }
}
