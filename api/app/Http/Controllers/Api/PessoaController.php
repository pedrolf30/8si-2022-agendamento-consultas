<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePessoaRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = Pessoa::all();

        return response()->json($pessoas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePessoaRequest $request)
    {
        $pessoa = Pessoa::create($request->all());

        return response()->json([
            'mensagem' => "Pessoa criada com sucesso!",
            'pessoa' => $pessoa
        ]);
    } 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        return response()->json($pessoa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(StorePessoaRequest $request, Pessoa $pessoa)
    {
        $pessoa->update($request->all());

        return response()->json([
            'mensagem' => "Pessoa atualizada com sucesso!",
            'pessoa' => $pessoa
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();

        return response()->json([
            'mensagem' => "Pessoa deletada com sucesso!",
            'pessoa' => $pessoa
        ]);
    }
}
