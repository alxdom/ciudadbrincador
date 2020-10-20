<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;
use App\Pulsera;

class Asignar extends Model
{
    protected $table = 'asignar_pulsera_al_cliente';
    protected $fillable = ['id_pulsera', 'id_usuarios'];
    //protected $guarded = ['id_pulsera', 'id_usuarios'];
    public $timestamps = false;

    public function usuario(){
        //return $this->belongsToMany(Usuario::class, 'id_usuario', 'id');
        return $this->belongsToMany('App\Usuario', 'id_usuario');
        }
      
    public function pulsera(){
        return $this->belongsToMany(Pulsera::class, 'id_pulsera', 'id');
        }
   
}
