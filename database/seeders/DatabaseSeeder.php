<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create a default user admin
         */
        if ( !\App\Models\User::where('email', 'admin@admin.com')->first() ) {
            \App\Models\User::factory(1)->create([
                'ci' => '1234567',
                'nombres' => 'super',
                'apellidos' => 'administrador',
                'email' => "admin@admin.com",
                'rol' => 'administrador',
                'estado' => 'activo',
                'password' => Hash::make('password')
            ]);
        }
        \App\Models\User::factory(100)->create();
    }
}
