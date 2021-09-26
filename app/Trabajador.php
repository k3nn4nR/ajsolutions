<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdeletes;

class Trabajador extends Model
{
    use softdeletes;
    protected $table = "trabajadores";
    protected $keyType  = 'string';
    protected $primaryKey = 'dni';
    protected $fillable = ['dni','user_id','ape_paterno','ape_materno','nombres','photo','direccion','celular','estado'];
    
    public function proyectos()
    {
        return $this->belongsToMany('App\Proyecto')->withPivot('estado', 'comentario','deleted_at');
    }
}
