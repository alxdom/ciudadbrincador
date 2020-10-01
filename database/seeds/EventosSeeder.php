<?php

use Illuminate\Database\Seeder;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('evento')->insert([
            'id' => 1,
            'cantidad_personas' => 115,
            'fecha_reservacion' => now(),
            'id_users' => 1,
            'id_tipo_evento' => 1,
        ]);

        DB::table('evento')->insert([
            'id' => 2,
            'cantidad_personas' => 199,
            'fecha_reservacion' => now(),
            'id_users' => 1,
            'id_tipo_evento' => 2,
        ]);

        DB::table('evento')->insert([
            'id' => 3,
            'cantidad_personas' => 15,
            'fecha_reservacion' => now(),
            'id_users' => 1,
            'id_tipo_evento' => 3,
        ]);

        DB::table('evento')->insert([
            'id' => 4,
            'cantidad_personas' => 26,
            'fecha_reservacion' => now(),
            'id_users' => 1,
            'id_tipo_evento' => 4,
        ]);

        DB::table('evento')->insert([
            'id' => 5,
            'cantidad_personas' => 32,
            'fecha_reservacion' => now(),
            'id_users' => 1,
            'id_tipo_evento' => 5,
        ]);

    }
}
