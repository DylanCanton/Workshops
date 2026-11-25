<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\MatriculaController;

Route::get('/', [MatriculaController::class, 'index'])
    ->name('matriculas.index');

Route::post('/matriculas', [MatriculaController::class, 'store'])
    ->name('matriculas.store');

Route::get('/matriculas/{id}', [MatriculaController::class, 'show'])
    ->name('matriculas.show');

Route::resource('cursos', CursoController::class)
    ->except(['show']);
