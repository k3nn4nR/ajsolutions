<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softdeletes;

class Trabajador extends Model
{
    use softdeletes;
    protected $table = "trabajadores";
    protected $keytype = 'string';
    protected $primaryKey = 'dni';
    protected $fillable = ['dni','user_id','ape_paterno','ape_materno','nombres','direccion','celular','estado'];
    
    
}
