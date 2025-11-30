<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Mentor\KelasController;

Route::middleware('auth')
    ->prefix('mentor')
    ->name('mentor.')
    ->group(function () {

        Route::resource('kelas', KelasController::class);

});
