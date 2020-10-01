<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Evento;

class TipoEvento extends Model
{
    protected $table = 'tipo_evento';

    protected $fillable = ['id', 'nombre'];
    public $timestamps = false;

    public function eventos()
    {
        return $this->hasMany(Evento::class,'id_tipo_evento','id');
    }
}
