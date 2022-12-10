<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function iniciar_sesion()
    {
        $usuarioBuscado = User::where('rut', '199692240')->first();
        if ($usuarioBuscado === null) {
            $usuarioBuscado = User::create([
                'rut' => '179771393',
                'name' => 'victor',
                'apellido' => 'munoz',
                'telefono' => '552355136',
                'email' => 'victor.munoz@ucn.cl',
                'direccion' => 'Avenida Angamos #0610',
                'status' => true,
                'rol' => 'cliente',
                'password' => Hash::make('victor123')
            ]);
        }
        $response = $this->actingAs($usuarioBuscado)->get('/login');
        $response->assertRedirect('/home');
    }
}
