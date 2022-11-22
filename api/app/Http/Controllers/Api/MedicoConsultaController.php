<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicoConsultaController extends Controller
{
    public function index($medico_id)
    {
        $consultas = DB::table('consultas as con')
            ->join('pacientes as pac', 'con.paciente_id', 'pac.id')
            ->join('pessoas as pPac', 'pac.pessoa_id', 'pPac.id')
            ->join('medicos as med', 'con.medico_id', 'med.id')
            ->join('pessoas as pMed', 'med.pessoa_id', 'pMed.id')
            ->where('con.medico_id', '=', $medico_id)
            ->orderBy('con.dataHoraConsulta', 'asc')
            ->select('con.id', 'con.dataHoraConsulta', 'pPac.nome as paciente', 'pMed.nome as medico')
            ->get();
        
        return response()->json($consultas);
    }
}
