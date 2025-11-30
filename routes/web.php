<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KursusController;
use App\Http\Controllers\ProgresKursusController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KursusPenggunaController;


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



// Route Murid (Auth Required)
Route::middleware(['auth'])->group(function () {

    // Kursus yang Tersedia untuk Dibeli
    Route::get('/kursus', [KursusController::class, 'index'])->name('kursus.index');
    Route::get('/kursus/{id}', [KursusController::class, 'show'])->name('kursus.show');

 
   
    Route::get('/my-courses/{kursusId}', [KursusPenggunaController::class, 'show'])->name('murid.kursus.detail'); // Rute baru yang memanggil fungsi show yang kita buat.

    // Progres (Update Checkbox)
    Route::post('/progres', [ProgresKursusController::class, 'updateProgress'])->name('progres.update'); // INI NAMA ROUTE ANDA

    // Ulasan (Store)
    Route::post('/ulasan', [UlasanController::class, 'store'])->name('ulasan.store');

    // Hasil Ulasan
    Route::get('/kursus/{id}/ulasan', [UlasanController::class, 'hasilUlasan'])->name('ulasan.hasil');
});
