<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function RegistrarUsuario()
    {
        $usuarioBuscado = User::where('rut', '199692240')->first();
        if ($usuarioBuscado === null) {
            $usuarioBuscado = User::create([
                'rut' => '199692240',
                'name' => 'victor',
                'apellido' => 'munoz',
                'telefono' => '56990906832',
                'email' => 'victor.munoz@ucn.cl',
                'direccion' => 'Avenida argentina 902',
                'status' => true,
                'password' => Hash::make('victor123')
            ]);
        }
        $response = $this->actingAs($usuarioBuscado)->get('/login');

        $credentials = [
            'rut' => '199692240',
            'name' => 'victor',
            'apellido' => 'munoz',
            'telefono' => '56990906832',
            'email' => 'victor.munoz@ucn.cl',
            'direccion' => 'Avenida argentina 902',
            'status' => true,
            'password' => Hash::make('victor123')
        ];

        $response = $this->post(route('register'), $credentials);

        $response->assertRedirect('/home');
    }


    /**
     * A basic feature test example.
     *
     * @return void
     */
    /** @test */
    public function IntentarRegistrarSinDatos()
    {

        $this->post(route('register'), [])->assertSessionHasErrors('rut');
    }
}
