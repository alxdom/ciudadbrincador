<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    $userAdmin = DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin Admin',
            'email' => 'admin@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Alejandro Moreno',
            'email' => 'alex@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('alex'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Rey Misterio',
            'email' => 'rey@black.com',
            'email_verified_at' => now(),
            'password' => Hash::make('misterio'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Set Martinez',
            'email' => 'setmartinezjimenez@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('mussgo'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
