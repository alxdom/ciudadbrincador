<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'nombre' => 'admin',
            'slug' => 'admin',
            'descripcion' => 'Administrador',
            'full-access' => 'yes',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 2,
            'nombre' => 'empleado',
            'slug' => 'empleado',
            'descripcion' => 'Empleado',
            'full-access' => 'no',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('roles')->insert([
            'id' => 3,
            'nombre' => 'usuario',
            'slug' => 'usuario',
            'descripcion' => 'Usuario',
            'full-access' => 'no',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
