<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;


Route::get('/', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/resident', [App\Http\Controllers\ResidentController::class, 'index'])->name('resident.index');
Route::get('/resident/create', [App\Http\Controllers\ResidentController::class, 'create']);
Route::post('/resident', [App\Http\Controllers\ResidentController::class, 'store']);
Route::get('/resident/{id}', [App\Http\Controllers\ResidentController::class, 'edit']);
Route::get('/resident/{id}/update', [App\Http\Controllers\ResidentController::class, 'update']);
Route::put('/resident/{id}', [App\Http\Controllers\ResidentController::class, 'update']);
Route::delete('/resident/{id}', [App\Http\Controllers\ResidentController::class, 'destroy']);