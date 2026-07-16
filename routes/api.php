<?php


use App\Http\Controllers\Api\DisciplineController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\NationController;
use App\Http\Controllers\Api\AthleteController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\MedalController;
use App\Http\Controllers\Api\ResultController;
use App\Http\Controllers\Api\DashboardController;


// Gestion des nations
Route::apiResource('nations', NationController::class);

// Gestion des disciplines
Route::apiResource('disciplines', DisciplineController::class);
Route::get('disciplines/{discipline}/athletes', [DisciplineController::class, 'athletes']);

// Gestion des athlètes
Route::apiResource('athletes', AthleteController::class);

// Gestion des épreuves
Route::apiResource('events', EventController::class);
Route::get('events/{event}/podium', [EventController::class, 'podium']);

// Gestion des résultats
Route::apiResource('results', ResultController::class);

// Tableau des médailles
Route::get('medals', [MedalController::class, 'index']);

// Tableau de bord - Statistiques
Route::prefix('dashboard')->group(function () {
    Route::get('athletes-count', [DashboardController::class, 'athletesCount']);
    Route::get('nations-count', [DashboardController::class, 'nationsCount']);
    Route::get('medals-count', [DashboardController::class, 'medalsCount']);
    Route::get('ranking', [DashboardController::class, 'ranking']);
    Route::get('medalists', [DashboardController::class, 'medalists']);
});
