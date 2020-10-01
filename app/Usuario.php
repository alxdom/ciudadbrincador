<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuarios';

    protected $fillable = [ 'id', 
                            'nombre', 
                            'apellidoP', 
                            'apellidoM', 
                            'tel', 
                            'domicilio', 
                            'foto'];


    public $timestamps = false;

    public function EventoUsuario(){
        return $this->hasMany(Evento::class,'id_usuarios','id');
    }
}

