<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'id' => 1,
            'nombre' => 'Dashboard',
            'slug' => 'dashboard.index',
            'descripcion' => 'Permiso de administrador',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permissions')->insert([
            'id' => 2,
            'nombre' => 'Control de acceso',
            'slug' => 'controlAcceso.index',
            'descripcion' => 'Permiso de empleado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('permissions')->insert([
            'id' => 3,
            'nombre' => 'Eventos',
            'slug' => 'eventos.index',
            'descripcion' => 'Permiso de usuario mortal',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
