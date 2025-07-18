<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ResidentController;

Route::get('/', function () {
        return redirect()->route('login');
    })->name('home');

// --- RUTE AUTENTIKASI ---
Route::get('/login', [AuthController::class, 'loginView'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'registerView'])->name('register.view');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');




    // Dashboard
    Route::get('/dashboard', function () {
        return view('pages.dashboard');
    })->name('dashboard');

    // Rute CRUD untuk Penduduk
    Route::get('/resident', [ResidentController::class, 'index'])->name('resident.index');
    Route::get('/resident/create', [ResidentController::class, 'create'])->name('resident.create');
    Route::post('/resident', [ResidentController::class, 'store'])->name('resident.store');
    Route::get('/resident/{id}/edit', [ResidentController::class, 'edit'])->name('resident.edit');
    Route::put('/resident/{id}', [ResidentController::class, 'update'])->name('resident.update');
    Route::delete('/resident/{id}', [ResidentController::class, 'destroy'])->name('resident.destroy');

