<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proyecto extends Model
{
            
    protected $fillable = ['Descripción','Estado','started_at','ended_at'];
    use SoftDeletes;
}
