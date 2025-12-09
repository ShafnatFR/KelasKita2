<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentor\KelasController;
use App\Http\Controllers\Mentor\MateriController;
use App\Http\Controllers\Mentor\IsiMateriController;



Route::middleware(['auth'])
    ->prefix('mentor')
    ->name('mentor.')
    ->group(function () {

        Route::resource('kelas', KelasController::class);
        Route::resource('materi', MateriController::class);
        Route::resource('isi-materi', IsiMateriController::class);
		Route::resource('materi/search/kelas{id}', MateriController::class);
});





