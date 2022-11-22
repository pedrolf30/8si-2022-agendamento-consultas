<?php

use App\Http\Controllers\Api\PessoaController;
use App\Http\Controllers\Api\PacienteController;
use App\Http\Controllers\Api\PacienteConsultaController;
use App\Http\Controllers\Api\MedicoController;
use App\Http\Controllers\Api\MedicoConsultaController;
use App\Http\Controllers\Api\ConsultaController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('logout', [AuthController::class, 'logout']);
    Route::apiResource('usuarios', UserController::class);
    Route::apiResource('pessoas', PessoaController::class);
    Route::apiResource('pacientes', PacienteController::class);
    Route::apiResource('pacientes.consultas', PacienteConsultaController::class);
    Route::apiResource('medicos', MedicoController::class);
    Route::apiResource('medicos.consultas', MedicoConsultaController::class);
    Route::apiResource('consultas', ConsultaController::class);
});