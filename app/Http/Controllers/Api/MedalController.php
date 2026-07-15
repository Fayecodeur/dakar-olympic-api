<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nation;
use Illuminate\Http\Response;

class MedalController extends Controller
{
    public function index()
    {
        $nations = Nation::withCount([
            'athletes as gold_medals' => function ($query) {
                $query->whereHas('results', function ($q) {
                    $q->where('medal', 'Or');
                });
            },

            'athletes as silver_medals' => function ($query) {
                $query->whereHas('results', function ($q) {
                    $q->where('medal', 'Argent');
                });
            },

            'athletes as bronze_medals' => function ($query) {
                $query->whereHas('results', function ($q) {
                    $q->where('medal', 'Bronze');
                });
            },
        ])
            ->get();

        $data = $nations->map(function ($nation) {
            return [
                'nation' => $nation->name,
                'gold' => $nation->gold_medals,
                'silver' => $nation->silver_medals,
                'bronze' => $nation->bronze_medals,
                'total' => $nation->gold_medals
                    + $nation->silver_medals
                    + $nation->bronze_medals,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Tableau des médailles récupéré avec succès.',
            'data' => $data,
        ], Response::HTTP_OK);
    }
}
