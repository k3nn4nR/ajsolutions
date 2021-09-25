<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use SoftDeletes;
    protected $fillable = ['Descripción','Estado','Empresa','started_at','ended_at'];

    public function trabajadores()
    {
        return $this->belongsToMany('App\Trabajador')->withPivot('esttado', 'comentario','deleted_at');
    }
}
