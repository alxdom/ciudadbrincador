<?php

use Illuminate\Database\Seeder;

class TipoEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_evento')->insert([
            'id' => 1,
            'nombre' => 'Fiesta'
        ]);

        DB::table('tipo_evento')->insert([
            'id' => 2,
            'nombre' => 'Carnita Asada'
        ]);

        DB::table('tipo_evento')->insert([
            'id' => 3,
            'nombre' => 'Baby Shower'
        ]);

        DB::table('tipo_evento')->insert([
            'id' => 4,
            'nombre' => 'Teletón'
        ]);

        DB::table('tipo_evento')->insert([
            'id' => 5,
            'nombre' => 'Bodorrio'
        ]);
    }
}
