<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DatabaseController;

Route::get('/', [DatabaseController::class, 'index'])->name('home');
Route::post('/connect', [DatabaseController::class, 'connect'])->name('connect');
Route::post('/select-database', [DatabaseController::class, 'selectDatabase'])->name('select.database');
Route::post('/run-query', [DatabaseController::class, 'runQuery'])->name('run.query');

