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
        return $this->belongsTo(Usuario::class,'id_usuario','id');
    }
}
