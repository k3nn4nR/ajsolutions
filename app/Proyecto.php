<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
    use SoftDeletes;
    protected $fillable = ['Descripción','Estado','Empresa','started_at','ended_at'];
    protected $guarded = ['id'];

    public function trabajadores()
    {
        return $this->belongsToMany('App\Trabajador')->withPivot('estado', 'comentario','deleted_at');
    }
}
