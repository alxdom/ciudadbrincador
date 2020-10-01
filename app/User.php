<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\ParkPermisos\Traits\UserTrait;

class User extends Authenticatable
{
    use Notifiable, UserTrait;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /* -----------------Relación de users con Eventos-----------------
    Recordar que los "users" son los que hacen uso del sistema para registro de eventos.
    Los "Usuarios" son los que aparecerán en la sala con su tiempo restante */
    public function EventoUsuario(){
        return $this->hasMany(Evento::class,'id_users','id');
    }


    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
