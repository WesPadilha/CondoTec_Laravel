<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuporteController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/suporte', [SuporteController::class, 'index'])->middleware('auth')->name('suporte');
Route::post('/suporte/store', [SuporteController::class, 'store'])->middleware('auth')->name('suporte.store');
Route::post('/suporte/atualizar/{protocolo}', [SuporteController::class, 'update'])->middleware('auth')->name('suporte.atualizar');
Route::post('/suporte/excluir/{protocolo}', [SuporteController::class, 'destroy'])->middleware('auth')->name('suporte.excluir');

// Página inicial
Route::get('/', function () {
    return view('auth/login');
});

Route::post('/register_apartment', [DashboardController::class, 'registerApartment'])
    ->middleware('auth')
    ->name('register_apartment');

// Dashboard - exibe o dashboard se o usuário estiver autenticado e verificado
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Visualizar Suporte - acessível através do dashboard
Route::get('/visualizar_suporte', [SuporteController::class, 'show'])
    ->middleware(['auth'])
    ->name('visualizar_suporte');

// Logout - termina a sessão do usuário
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/login');
})->name('logout');

// Grupo de rotas que requer autenticação
Route::middleware('auth')->group(function () {
    // Rotas de perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Autenticação - inclui as rotas de autenticação geradas pelo Laravel
require __DIR__.'/auth.php';
