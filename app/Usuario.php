<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tiempo;

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

    /*public function EventoUsuario(){
        return $this->hasMany(Evento::class,'id_usuarios','id');
    } */
    public function tiempo()
    {
        return $this->belongsToMany(Tiempo::class,'id_usuario','id');
        //return $this->belongsToMany('App\Tiempo');
        
    }
}

