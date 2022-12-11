<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\ImovelController;
use App\Http\Controllers\LocacaoController;
use App\Http\Controllers\PagamentoController;
use App\Http\Controllers\VendaController;
use App\Http\Controllers\WipeController;
use Illuminate\Support\Facades\Route;

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
    return view('index');
});
Route::get('/auth', [AuthController::class, 'index'])->name('login');
Route::resource('/empresas', EmpresaController::class);
Route::resource('/clientes', ClienteController::class);
Route::resource('/imoveis', ImovelController::class);
Route::resource('/locacoes', LocacaoController::class);
Route::resource('/vendas', VendaController::class);
Route::resource('/pagamentos', PagamentoController::class);
Route::get('/wipe', [WipeController::class, 'index']);
Route::get('/create-empresa', function () {
    return view('new-comp');
});
