<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\LocationController;
use App\Http\Controllers\API\emergenciacontroller;
Route::middleware('api')->group(function () {
    // Grupo de rotas para locations
    Route::prefix('locations')
        ->name('locations.')
        ->group(function () {
            Route::get('/', [LocationController::class, 'index'])->name('index');
            Route::get('{lat}/{lon}/{user}/{alert}', [LocationController::class, 'store'])->name('store');
            Route::get('show/{id}', [LocationController::class, 'show'])->name('show');
        });
});
