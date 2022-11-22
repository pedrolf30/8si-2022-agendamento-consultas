<?php

namespace Tests\Feature\Http\Controller;

use App\Models\Pessoa;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PessoaControllersTest extends TestCase
{
    public function test_store()
    {
        $pessoa = new Pessoa;
        $pessoa->nome = "Nome teste";
        $pessoa->cpf = "000.000.000-00";
        $pessoa->email = "nome_teste@teste.com";
        $pessoa->telefone = "(00)00000-0000";
        $pessoa->dtNasc = "1800-04-29";
        $pessoa->isUsuario = 1;

        $response = $this->post("/api/pessoas", $pessoa->toArray());
        $response->assertStatus(201);
    }

    public function test_index()
    {
        $response = $this->get('/api/pessoas');

        $response->assertStatus(200);
    }

    public function test_show()
    {
        $pessoa = Pessoa::query()->inRandomOrder()->first();

        $response = $this->get("/api/pessoas/{$pessoa->id}");
        $response->assertStatus(200);
    }

    public function test_update()
    {
        $pessoa = Pessoa::query()->inRandomOrder()->first();
        $pessoa->nome = "Sr. Nome Teste";
        $pessoa->cpf = "000.000.000-01";

        $response = $this->put("/api/pessoas/{$pessoa->id}", $pessoa->toArray());
        $response->assertStatus(200);
    }

    public function test_destroy()
    {
        $pessoa = Pessoa::query()->inRandomOrder()->first();
        $response = $this->delete("/api/pessoas/{$pessoa->id}");
        $response->assertStatus(204);
    }
}
