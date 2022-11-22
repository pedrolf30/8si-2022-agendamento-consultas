<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Medico;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedicoControllerTest extends TestCase
{
    public function test_store()
    {
        $medico = new Medico;
        $medico->especialidade = "Cardiologista";
        $medico->crm = "CRM/SP 123456";
        $medico->pessoa_id = 1;

        $response = $this->post("/api/medicos", $medico->toArray());
        $response->assertStatus(201);
    }

    public function test_index()
    {
        $response = $this->get('/api/medicos');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $medico = Medico::query()->inRandomOrder()->first();

        $response = $this->get("/api/medicos/{$medico->id}");
        $response->assertStatus(200);
    }

    public function test_show_appointments()
    {
        $medico = Medico::query()->inRandomOrder()->first();

        $response = $this->get("/api/medicos/{$medico->id}/consultas");
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $medico = Medico::query()->inRandomOrder()->first();
        $medico->especialidade = "Cirurgião Geral";
        $medico->crm = "CRM/SP 654321";

        $response = $this->put("/api/medicos/{$medico->id}", $medico->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $medico = Medico::query()->inRandomOrder()->first();
        $response = $this->delete("/api/medicos/{$medico->id}");
        $response->assertStatus(204);
    }
}
