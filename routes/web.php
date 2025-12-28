<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentProfileController;
use App\Http\Controllers\EtudiantController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\GoogleController;

Route::get('/', function () {
    return redirect()->route('login');
});

// IMPORTANT : route dashboard (évite les boucles)
Route::middleware(['auth'])->get('/dashboard', function () {
    return Auth::user()->role === 'ADMIN'
        ? redirect()->route('etudiants.index')
        : redirect()->route('student.profile');
})->name('dashboard');

// Route profil étudiant
Route::middleware(['auth'])->get('/mon-profil', [StudentProfileController::class, 'show'])
    ->name('student.profile');

// CRUD Admin (si tu l’utilises)
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('etudiants', EtudiantController::class);
});

Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])
    ->name('google.redirect');

Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
    ->name('google.callback');


require __DIR__.'/auth.php';
