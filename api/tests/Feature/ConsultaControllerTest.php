<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Carbon\Carbon;

class ConsultaControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_index()
    {
        $response = $this->get('/api/consultas');

        $response->assertStatus(200);
    }

    public function test_store()
    {
        $consulta = new Consulta;
        $consulta->dataHoraConsulta = Carbon::now();
        $consulta->paciente_id = 1;
        $consulta->medico_id = 1;

        $response = $this->post("/api/consultas", $consulta->toArray());
        $response->assertStatus(201);
    }

    public function test_show()
    {
        $consulta = Consulta::query()->inRandomOrder()->first();

        $response = $this->get("/api/consultas/{$consulta->id}");
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $consulta = Consulta::query()->inRandomOrder()->first();
        $consulta->dataHoraConsulta = Carbon::now();

        $response = $this->put("/api/consultas/{$consulta->id}", $consulta->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $consulta = Consulta::query()->inRandomOrder()->first();
        $response = $this->delete("/api/consultas/{$consulta->id}");
        $response->assertStatus(204);
    }
}
