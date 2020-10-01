<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pulsera extends Model
{
    protected $table = 'pulsera';
    protected $fillable = ['id', 'ip', 'estado'];
    public $timestamps = false;
}
