<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ProprietarioController;
use App\Http\Controllers\AnuncioController;
use App\Http\Controllers\HomeController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Route::get('veiculo/remove/{id_veiculo}', [App\Http\Controllers\VeiculoController::class, 'remove'])->name('veiculo-remove');
Route::get('veiculo/editar/{id_veiculo}', [App\Http\Controllers\VeiculoController::class, 'editar'])->name('veiculo-editar');
Route::get('/veiculo/formulario', [App\Http\Controllers\VeiculoController::class, 'formulario'])->name('veiculo-formulario');
Route::post('/veiculo/store', [App\Http\Controllers\VeiculoController::class, 'store'])->name('veiculo-store');
Route::get('/veiculo/listar', [App\Http\Controllers\VeiculoController::class,'listar'])->name('veiculo-listar');

Route::get('/proprietario/formulario', [App\Http\Controllers\ProprietarioController::class, 'formulario'])->name('proprietario-formulario');
Route::post('/proprietario/store', [App\Http\Controllers\ProprietarioController::class, 'store'])->name('proprietario-store');
Route::get('/proprietario/listar', [App\Http\Controllers\ProprietarioController::class, 'listar'])->name('proprietario-listar');
Route::get('/proprietario/remove/{id_proprietario}', [ProprietarioController::class, 'remove'])->name('proprietario-remove');
Route::get('/proprietario/editar{id_proprietario}', [App\Http\Controllers\ProprietarioController::class, 'editar'])->name('proprietario-editar');

Route::get('/anuncio/formulario', [App\Http\Controllers\AnuncioController::class, 'formulario'])->name('anuncio-formulario');
Route::post('/anuncio/store', [App\Http\Controllers\AnuncioController::class, 'store'])->name('anuncio-store');
Route::get('/anuncio/listar', [App\Http\Controllers\AnuncioController::class, 'listar'])->name('anuncio-listar');
Route::get('/anuncio/remove{id_anuncio}', [App\Http\Controllers\AnuncioController::class, 'remove'])->name('anuncio-remove');
Route::get('/anuncio/editar{id_anuncio}', [App\Http\Controllers\AnuncioController::class, 'editar'])->name('anuncio-editar');





