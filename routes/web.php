<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
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
Route::get('/create-empresa', function () {
    return view('new-comp');
});
