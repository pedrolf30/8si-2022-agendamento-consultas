<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PacienteControllerTest extends TestCase
{
    public function test_store()
    {
        $paciente = new Paciente;
        $paciente->convenio = "UNIMED";
        $paciente->pessoa_id = 1;

        $response = $this->post("/api/pacientes", $paciente->toArray());
        $response->assertStatus(201);
    }
    
    public function test_index()
    {
        $response = $this->get('/api/pacientes');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $paciente = Paciente::query()->inRandomOrder()->first();

        $response = $this->get("/api/pacientes/{$paciente->id}");
        $response->assertStatus(200);
    }

    public function test_show_appointments()
    {
        $paciente = Paciente::query()->inRandomOrder()->first();

        $response = $this->get("/api/pacientes/{$paciente->id}/consultas");
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $paciente = Paciente::query()->inRandomOrder()->first();
        $paciente->convenio = "Amil";

        $response = $this->put("/api/pacientes/{$paciente->id}", $paciente->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $paciente = Paciente::query()->inRandomOrder()->first();
        $response = $this->delete("/api/pacientes/{$paciente->id}");
        $response->assertStatus(204);
    }
}
