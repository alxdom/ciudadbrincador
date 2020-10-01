<?php

namespace App\ParkPermisos\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        'nombre', 'slug', 'descripcion', 'full-access',
    ];


    public function users(){
        return $this->belongsToMany('App\User')->withTimesTamps();
    }

    public function permissions(){  
        return $this->belongsToMany('App\ParkPermisos\Models\Permission')->withTimesTamps();
    }
}
