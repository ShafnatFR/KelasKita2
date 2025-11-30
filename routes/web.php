<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/jadi-mentor', [MentorController::class, 'upgrade'])
    ->middleware('auth')
    ->name('jadi-mentor');

Route::get('/jadi-murid', [MentorController::class, 'downgrade'])
    ->middleware('auth')
    ->name('jadi-murid');



require __DIR__.'/mentor.php';
