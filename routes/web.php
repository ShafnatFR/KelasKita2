<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\admin\ManageUser;
use App\Http\Controllers\admin\ManageKelas;
use App\Http\Controllers\admin\ManageLaporan;
use App\Http\Controllers\admin\ManageMateri;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth Routes
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboard Murid
Route::get('/dashboard', [AuthController::class, 'dashboard'])
    ->middleware('auth')
    ->name('dashboard');

// Role Management
Route::get('/jadi-mentor', [MentorController::class, 'upgrade'])
    ->middleware('auth')
    ->name('jadi-mentor');

Route::get('/jadi-murid', [MentorController::class, 'downgrade'])
    ->middleware('auth')
    ->name('jadi-murid');

Route::post('loginAdmin', [AuthController::class, 'loginAdmin']);

// --- GROUP ROUTE ADMIN (WAJIB ADA) ---
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard Admin
    Route::get('dashboardAdmin', [AuthController::class, 'dashboardAdmin'])->name('dashboardAdmin');

    // CRUD User
    Route::resource('users', ManageUser::class);

    // CRUD Kelas
    Route::resource('kelas', ManageKelas::class)->parameters(['kelas' => 'kelas']);

    Route::resource('materi', ManageMateri::class);
});

require __DIR__ . '/mentor.php';