<?php

use Illuminate\Database\Seeder;
use App\User;
use App\ParkPermisos\Models\Role;
use App\ParkPermisos\Models\Permission;

class ParkPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//truncar tablas intermedias para que siempre tengan los mismo ID's
DB::statement('SET foreign_key_checks=0');
DB::table('role_user')->truncate();
DB::table('permission_role')->truncate();
Permission::truncate();
Role::truncate();
DB::statement('SET foreign_key_checks=1');


//*****************************************************************
//**********************USUARIOS Y SUS ROLES***********************
//*****************************************************************



//Crear usuario administrador y su rol junto con la relación

        $userAdmin = User::where('email', 'admin@black.com')->first();
        if ($userAdmin) {
            $userAdmin->delete();
        }
        $userAdmin = User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrador'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $rolAdmin = Role::create([
            'id' => 1,
            'nombre' => 'admin',
            'slug' => 'admin',
            'descripcion' => 'Administrador',
            'full-access' => 'yes',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $userAdmin->roles()->sync([$rolAdmin->id]);

        $rolUser = Role::create([
            'id' => 2,
            'nombre' => 'Usuario normal',
            'slug' => 'normie',
            'descripcion' => 'Normie',
            'full-access' => 'no',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        $userAdmin->roles()->sync([$rolAdmin->id]);






//*****************************************************************
//**********************PERMISOS DE LOS ROLES**********************
//*****************************************************************

$permission_all = [];

//ROLES
$permission = Permission::create([
    'nombre' => 'List role',
    'slug' => 'role.index',
    'descripcion' => 'El usuario puede listar los roles',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



$permission = Permission::create([
    'nombre' => 'Show role',
    'slug' => 'role.show',
    'descripcion' => 'El usuario puede ver los roles',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



$permission = Permission::create([
    'nombre' => 'Create role',
    'slug' => 'role.create',
    'descripcion' => 'El usuario puede crear roles',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;


$permission = Permission::create([
    'nombre' => 'Edit role',
    'slug' => 'role.edit',
    'descripcion' => 'El usuario puede editar roles',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'nombre' => 'Destroy role',
    'slug' => 'role.destroy',
    'descripcion' => 'El usuario puede eliminar roles',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



//USUARIOS
$permission = Permission::create([
    'nombre' => 'List user',
    'slug' => 'user.index',
    'descripcion' => 'El usuario puede listar los users',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



$permission = Permission::create([
    'nombre' => 'Show user',
    'slug' => 'user.show',
    'descripcion' => 'El usuario puede ver los users',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



$permission = Permission::create([
    'nombre' => 'Create user',
    'slug' => 'user.create',
    'descripcion' => 'El usuario puede crear users',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;


$permission = Permission::create([
    'nombre' => 'Edit user',
    'slug' => 'user.edit',
    'descripcion' => 'El usuario puede editar users',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'nombre' => 'Destroy user',
    'slug' => 'user.destroy',
    'descripcion' => 'El usuario puede eliminar users',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;


//$rolAdmin->permissions()->sync($permission_all);


$permission = Permission::create([
    'nombre' => 'Show own user',
    'slug' => 'userown.show',
    'descripcion' => 'El usuario solo puede ver su propio usuario',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;


$permission = Permission::create([
    'nombre' => 'Edit own user',
    'slug' => 'userown.edit',
    'descripcion' => 'El usuario solo puede editar su propio usuario',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



//CONTROL DE ACCESO
$permission = Permission::create([
    'nombre' => ' show access',
    'slug' => 'controlAcceso.index',
    'descripcion' => 'El usuario puede acceder al control de acceso',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;

$permission = Permission::create([
    'nombre' => 'create in access',
    'slug' => 'controlAcceso.create',
    'descripcion' => 'El usuario puede registrar personas en el control de acceso',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;



//DASHBOARD ADMIN
$permission = Permission::create([
    'nombre' => 'Dashboard admin',
    'slug' => 'dashboard.index',
    'descripcion' => 'El usuario puede acceder al dashboard de administrador',
    'created_at' => now(),
    'updated_at' => now()
]);
$permission_all[] = $permission->id;

    }
}
