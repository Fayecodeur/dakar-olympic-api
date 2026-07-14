<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\Api\DisciplineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NationController;
use App\Http\Controllers\Api\AthleteController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('nations', NationController::class);
Route::apiResource('disciplines', DisciplineController::class);
Route::apiResource('athletes', AthleteController::class);
