<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;


class inicioTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    public function IntentarRegistrarSinDatos(): void
    {

        $this->post(route('register'), [])->assertSessionHasErrors('rut');
    }
}
