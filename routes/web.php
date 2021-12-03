<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AporteController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->name('aporte.')->group(function (){
    Route::get('/lancamento', [AporteController::class, 'indexAporte'])->name('lancamento');
    Route::post('/lancamento/cadastro', [AporteController::class, 'storeAporte'])->name('cadlancamento');

    /*Route::get('/investimento', function () {
        return 'Ola';
    })->name('investimento');

    Route::post('/investimento/cadastro', function () {
        return 'Ola';
    })->name('cadinvestimento');
    */

});

Route::middleware(['auth:sanctum', 'verified'])->name('relatorio.')->group(function (){
    Route::get('/anual/gasto', [DashboardController::class, 'anualGasto'])->name('anualgasto');
    Route::get('/anual/investimento', [DashboardController::class, 'anualInvestimento'])->name('anualinvestimento');
    Route::get('/anual/receita', [DashboardController::class, 'anualReceita'])->name('anualreceita');
    Route::get('/saldo', [DashboardController::class, 'saldoMensal'])->name('saldo');
    Route::get('/categorias', [DashboardController::class, 'anualCategoria'])->name('categoria');

    /*
    
    Route::get('/setores', function () {
        return 'Ola';
    })->name('setores');

    Route::get('/ativos', function () {
        return 'Ola';
    })->name('ativos');
    */
});