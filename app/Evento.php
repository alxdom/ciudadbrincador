<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TipoEvento;

class Evento extends Model
{
    protected $table = 'evento';

    protected $fillable = ['id','cantidad_personas', 'fecha_reservacion', 'id_users', 'id_tipo_evento'];
    protected $dates = ['fecha_reservacion'];
    public $timestamps = false;

    public function tipoEvento(){
        return $this->belongsTo(TipoEvento::class,'id_tipo_evento','id');
    }


    public function usuarios()
    {
        return $this->belongsTo(User::class,'id_users','id');
    }
}
