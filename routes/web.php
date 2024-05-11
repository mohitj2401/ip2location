<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeolocationLogController;

Route::resource('/', GeolocationLogController::class);

Route::get("/mylocation",[GeolocationLogController::class,'getMyLocation'])->name("mylocation");
