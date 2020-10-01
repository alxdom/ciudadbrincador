<?php

namespace App\ParkPermisos\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    /* -----------------Asiganción masiva-----------------*/
    protected $fillable = [
        'nombre', 'slug', 'descripcion',
    ];
        
    
    public function roles(){
        return $this->belongsToMany('App\ParkPermisos\Models\Role')->withTimesTamps();
    }
}
