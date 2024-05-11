<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeolocationLogController;

Route::get('/', [GeolocationLogController::class, 'index']);

Route::delete('/geolocation-delete/{geolocationLog}', [GeolocationLogController::class, 'destroy'])->name('delete.geolocation');

Route::get("/mylocation", [GeolocationLogController::class, 'getMyLocation'])->name("mylocation");
