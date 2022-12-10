<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Administrador',
            'apellido' => 'Administrador',
            'telefono' => '11111111',
            'email' => 'admin@ucn.cl',
            'direccion' => 'Administrador',
            'rut' => '111111111',
            'status' => 1,
            'rol' => "Administrador",
            'password' => bcrypt("123456"),
        ]);
    }
}
