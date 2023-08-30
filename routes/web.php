<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ChartJSController;
use Laravel\Fortify\Features;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

if (Features::enabled(Features::registration())) {
    $enableViews = config('fortify.views', true);
    if ($enableViews) {
        Route::get('/cadastro', [RegisteredUserController::class, 'create'])
            ->middleware(['guest:'.config('fortify.guard')])
            ->name('register');
    }

    Route::post('/cadastro', [RegisteredUserController::class, 'store'])
        ->middleware(['guest:'.config('fortify.guard')]);
}

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/', function () {
        return redirect('/paciente');
    })->name('dashboard');

    Route::get('/paciente', [PacienteController::class, 'index'])->name('pacientes.index');
    Route::get('/paciente/create', [PacienteController::class, 'create'])->name('pacientes.create');
    Route::get('/paciente/{id}', [PacienteController::class, 'show'])->name('pacientes.show');
    Route::get('/paciente/edit/{id}', [PacienteController::class, 'edit'])->name('pacientes.edit');
    Route::delete('/paciente/destroy/{id}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');
    Route::post('/paciente', [PacienteController::class, 'store'])->name('pacientes.store');
    
    Route::get('/grafico', [ChartJSController::class, 'index'])->name('grafico.index');
    Route::get('/graficoEspecialidade', [ChartJSController::class, 'especialidade'])->name('grafico.especialidade');
    
    Route::get('/graficoRisco', [ChartJSController::class, 'risco'])->name('grafico.risco');
    Route::get('/graficoIdade', [ChartJSController::class, 'idade'])->name('grafico.idade');
    Route::get('/graficoFiltro', [ChartJSController::class, 'filtro'])->name('grafico.filtro');
});




/*
Route::any('/vaga/search', [VagaController::class, 'search'])->name('vaga.search');
Route::get('/vaga/create', [VagaController::class, 'create'])->name('vaga.create');
Route::put('/vaga/{id}', [VagaController::class, 'update'])->name('vaga.update');
Route::get('/vaga/edit/{id}', [VagaController::class, 'edit'])->name('vaga.edit');
Route::delete('/vaga/destroy/{id}', [VagaController::class, 'destroy'])->name('vaga.destroy');
Route::get('/vaga/{id}', [VagaController::class, 'show'])->name('vaga.show');
Route::post('/vaga', [VagaController::class, 'store'])->name('vaga.store');
Route::get('/vaga', [VagaController::class, 'index'])->name('vaga.index');
*/