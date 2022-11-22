<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medico;
use App\Http\Requests\StoreMedicoRequest;
use App\Http\Requests\UpdateMedicoRequest;
use Illuminate\Support\Facades\DB;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::with('pessoa')->get();
        
        return response()->json($medicos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMedicoRequest $request)
    {
        $medico = Medico::create($request->all());

        return response()->json([
            'mensagem' => "Médico(a) criado(a) com sucesso!",
            'medico' => $medico
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        $medico = DB::table('medicos as med')
        ->join('pessoas as pes', 'med.pessoa_id', 'pes.id')
        ->where('med.id', '=', $medico->id)
        ->select('med.id', 'med.crm', 'med.especialidade', 'pes.nome')
        ->get();
    
        return response()->json($medico);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicoRequest  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicoRequest $request, Medico $medico)
    {
        $medico->update($request->all());

        return response()->json([
            'mensagem' => "Médico(a) atualizado(a) com sucesso!",
            'medico' => $medico
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        $medico->delete();

        return response()->json([
            'mensagem' => "Médico(a) deletado(a) com sucesso!",
            'medico' => $medico
        ], 204);
    }
}
