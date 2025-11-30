<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MentorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ManageUser;
use App\Http\Controllers\admin\ManageKelas;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('dashboardAdmin', [AuthController::class, 'dashboardAdmin'])->name('dashboardAdmin');

    Route::resource('users', ManageUser::class);

    Route::get('/kelas', [ManageKelas::class, 'getClass'])->name('kelola.kelas');
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

Route::post('loginAdmin', [AuthController::class, 'loginAdmin']);

require __DIR__ . '/mentor.php';
