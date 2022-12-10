<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class homeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function cargar_HOME(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function IntentarIniciarSinDatos(): void
    {

        $this->post(route('login'), [])->assertSessionHasErrors('rut');
    }
}
