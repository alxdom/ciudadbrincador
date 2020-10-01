<?php

namespace App\ParkPermisos\Traits;
use App\User;
/**
 * 
 */
trait UserTrait
{
    /* -----------------Relación de users con Roles-----------------*/
    public function roles(){
        return $this->belongsToMany('App\ParkPermisos\Models\Role')->withTimesTamps();
    }
/* -----------------Funcion para saber que permisos tiene un rol-----------------*/
    public function havePermission($permission){

        foreach ($this->roles as $role) {

            if ($role['full-access']=='yes') {
                return true;
            }
            
        foreach ($role->permissions as $perm) {

            if ($perm->slug == $permission) {
                return true;
                } 
            }

        }

        
        return false;
    }
}
