<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

use Illuminate\Support\Facades\Auth;

Route::get('/', function() {
    return view('welcome');
});

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'registerSubmit'])->name('register.submit');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::get('/session-choice', [SessionController::class, 'showChoice'])->name('session.choice');
Route::post('/session-choice', [SessionController::class, 'handleChoice'])->name('session.handle');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::get('/logout', function () {
    Auth::logout(); // Destroy the user session
    session()->invalidate(); // Invalidate the session
    session()->regenerateToken(); // Regenerate CSRF token for security

    return redirect('/login')->with('success', 'Logged out successfully!');
})->name('logout');
