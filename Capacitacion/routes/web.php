<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// Ruta para redirigir a Google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');

// Ruta de callback de Google
Route::get('auth/callback/google', [LoginController::class, 'handleGoogleCallback']);
