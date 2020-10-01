<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tiempo extends Model
{
    protected $table = 'tiempo';
    protected $fillable = ['id', 'descripcion', 'orden', 'strike'];
    public $timestamps = false;
}
