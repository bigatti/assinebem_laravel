<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\DocumentoController;
use App\Http\Controllers\AssineBemController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* -- Assine Bem -- */
Route::resource('assine_bem', AssineBemController::class);
Route::get('/teste', [App\Http\Controllers\AssineBemController::class, 'teste'])->name('teste');
Route::get('/get_identifier', [App\Http\Controllers\AssineBemController::class, 'get_identifier'])->name('get_identifier');
/* -- Rotas -- */
Route::resource('agenda', AgendaController::class);
Route::resource('documento', DocumentoController::class);
Route::get('/documento/invalidar_documento/{id}', [App\Http\Controllers\DocumentoController::class, 'invalidar_documento'])->name('documento.invalidar_documento');
Route::get('/documento/download_documento/{id}', [App\Http\Controllers\DocumentoController::class, 'download_documento'])->name('documento.download_documento');


