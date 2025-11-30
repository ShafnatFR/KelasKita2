<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentor\KelasController;

Route::middleware(['auth'])->prefix('mentor')->group(function () {
    Route::middleware('mentor')->group(function () {
        Route::resource('kelas', KelasController::class);
        Route::resource('materi', MateriController::class);
        Route::resource('isi-materi', IsiMateriController::class);
    });
});

