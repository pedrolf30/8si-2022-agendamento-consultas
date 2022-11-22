<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use App\Http\Requests\StorePacienteRequest;
use App\Http\Requests\UpdatePacienteRequest;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::with('pessoa')->get();
        
        return response()->json($pacientes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePacienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePacienteRequest $request)
    {
        $paciente = Paciente::create($request->all());

        return response()->json([
            'mensagem' => "Paciente criado(a) com sucesso!",
            'paciente' => $paciente
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $paciente = DB::table('pacientes as pac')
        ->join('pessoas as pes', 'pac.pessoa_id', 'pes.id')
        ->where('pac.id', '=', $paciente->id)
        ->select('pac.id', 'pac.convenio', 'pes.nome')
        ->get();
    
        return response()->json($paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacienteRequest  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePacienteRequest $request, Paciente $paciente)
    {
        $paciente->update($request->all());

        return response()->json([
            'mensagem' => "Paciente atualizado(a) com sucesso!",
            'paciente' => $paciente
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        $paciente->delete();

        return response()->json([
            'mensagem' => "Paciente deletado(a) com sucesso!",
            'paciente' => $paciente
        ], 204);
    }
}
