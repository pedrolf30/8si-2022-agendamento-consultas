<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Consulta;
use App\Http\Requests\StoreConsultaRequest;
use App\Http\Requests\UpdateConsultaRequest;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $consultas = DB::table('consultas as con')
            ->join('pacientes as pac', 'con.paciente_id', 'pac.id')
            ->join('pessoas as pPac', 'pac.pessoa_id', 'pPac.id')
            ->join('medicos as med', 'con.medico_id', 'med.id')
            ->join('pessoas as pMed', 'med.pessoa_id', 'pMed.id')
            ->orderBy('con.dataHoraConsulta', 'asc')
            ->select('con.id', 'con.dataHoraConsulta', 'pPac.nome as paciente', 'pMed.nome as medico')
            ->get();
        
        return response()->json($consultas);
    }

    public function store(StoreConsultaRequest $request)
    {
        $consulta = Consulta::create($request->all());

        return response()->json([
            'mensagem' => "Consulta agendada com sucesso!",
            'consulta' => $consulta
        ], 201);
    }

    public function show(Consulta $consulta)
    {
        $consulta = DB::table('consultas as con')
        ->join('pacientes as pac', 'con.paciente_id', 'pac.id')
        ->join('pessoas as pPac', 'pac.pessoa_id', 'pPac.id')
        ->join('medicos as med', 'con.medico_id', 'med.id')
        ->join('pessoas as pMed', 'med.pessoa_id', 'pMed.id')
        ->where('con.id', '=', $consulta->id)
        ->select('con.id', 'con.dataHoraConsulta', 'pPac.nome as paciente', 'pMed.nome as medico')
        ->get();
    
        return response()->json($consulta);
    }

    public function update(UpdateConsultaRequest $request, Consulta $consulta)
    {
        $consulta->update($request->all());

        return response()->json([
            'mensagem' => "Consulta atualizada com sucesso!",
            'consulta' => $consulta
        ]);
    }

    public function destroy(Consulta $consulta)
    {
        $consulta->delete();

        return response()->json([
            'mensagem' => "Consulta cancelada com sucesso!",
            'consulta' => $consulta
        ], 204);
    }
}
