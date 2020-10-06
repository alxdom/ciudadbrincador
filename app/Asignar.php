<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asignar extends Model
{
    protected $table = 'asignatura_pulsera_tiempo_al_cliente';
    protected $fillable = ['id_pulsera', 'id_usuarios'];
    public $timestamps = false;

   
}
