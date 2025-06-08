<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrevisaoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/previsao', [PrevisaoController::class, 'index'])->name('previsao.index');
Route::post('/previsao/buscar', [PrevisaoController::class, 'buscar'])->name('previsao.buscar');
