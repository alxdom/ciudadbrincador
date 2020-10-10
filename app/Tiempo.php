<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Usuario;

class Tiempo extends Model
{
    protected $table = 'tiempo';
    protected $fillable = ['id', 'hora_salida', 'id_usuario', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function usuario()
    {
        //return $this->belongsToMany(Usuario::class,'id','id_usuario');
        return $this->belongsTo('App\Usuario', 'id_usuario');
        //return $this->belongsToMany('App\Usuario', 'id_usuario');
    }
}
