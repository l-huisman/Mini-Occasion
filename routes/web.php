<?php

use App\Http\Controllers\VehicleSearchController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});


Route::get('vehicle', [VehicleController::class, 'index']);
Route::get('/vehicle/{vehicle}', [VehicleController::class, 'show']);
Route::get('/search', VehicleSearchController::class);
