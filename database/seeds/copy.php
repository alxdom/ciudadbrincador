<?php
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
