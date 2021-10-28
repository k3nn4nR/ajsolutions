<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Factor extends Model
{
    use SoftDeletes;
    protected $table = "factores";
    protected $fillable = ['descripcion'];
    protected $guarded = ['id'];

    public function preguntas()
    {
        return $this->hasMany('App\Pregunta');
    }

}
