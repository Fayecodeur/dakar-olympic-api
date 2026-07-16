<?php

// use Illuminate\Http\Request;

use App\Http\Controllers\Api\DisciplineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NationController;
use App\Http\Controllers\Api\AthleteController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\MedalController;
use App\Http\Controllers\Api\ResultController;
use App\Http\Controllers\Api\DashboardController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResource('nations', NationController::class);
Route::apiResource('disciplines', DisciplineController::class);
Route::apiResource('athletes', AthleteController::class);
Route::apiResource('events', EventController::class);
Route::apiResource('results', ResultController::class);
Route::get('events/{event}/podium', [EventController::class, 'podium']);
Route::apiResource('events', EventController::class);
Route::get('medals', [MedalController::class, 'index']);
Route::get(
    'disciplines/{discipline}/athletes',
    [DisciplineController::class, 'athletes']
);

Route::get('dashboard/athletes-count', [DashboardController::class, 'athletesCount']);
Route::get(
    'dashboard/nations-count',
    [DashboardController::class, 'nationsCount']
);

Route::get(
    'dashboard/medals-count',
    [DashboardController::class, 'medalsCount']
);

Route::get(
    'dashboard/ranking',
    [DashboardController::class, 'ranking']
);

Route::get(
    'dashboard/medalists',
    [DashboardController::class, 'medalists']
);
