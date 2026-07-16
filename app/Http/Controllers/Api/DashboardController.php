<?php

namespace App\Http\Controllers\Api;



use App\Http\Controllers\Controller;
use App\Models\Athlete;
use App\Models\Nation;
use App\Models\Result;
use Illuminate\Http\Response;


class DashboardController extends Controller
{
    public function athletesCount()
    {
        return response()->json([
            'success' => true,
            'message' => 'Nombre total d’athlètes récupéré avec succès.',
            'data' => [
                'total_athletes' => Athlete::count(),
            ],
        ], Response::HTTP_OK);
    }

    public function nationsCount()
    {
        return response()->json([
            'success' => true,
            'message' => 'Nombre total de pays participants récupéré avec succès.',
            'data' => [
                'total_nations' => Nation::count(),
            ],
        ], Response::HTTP_OK);
    }

    public function medalsCount()
    {
        return response()->json([
            'success' => true,
            'message' => 'Nombre total de médailles attribuées récupéré avec succès.',
            'data' => [
                'gold' => Result::where('medal', 'Or')->count(),
                'silver' => Result::where('medal', 'Argent')->count(),
                'bronze' => Result::where('medal', 'Bronze')->count(),
            ],
        ], Response::HTTP_OK);
    }

    public function ranking()
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

        $ranking = $nations->map(function ($nation) {

            return [
                'nation' => $nation->name,
                'gold' => $nation->gold_medals,
                'silver' => $nation->silver_medals,
                'bronze' => $nation->bronze_medals,
                'points' => ($nation->gold_medals * 7)
                    + ($nation->silver_medals * 4)
                    + ($nation->bronze_medals * 1),
            ];
        })
            ->sortByDesc('points')
            ->values();

        return response()->json([
            'success' => true,
            'message' => 'Classement des nations récupéré avec succès.',
            'data' => $ranking,
        ], Response::HTTP_OK);
    }


    public function medalists()
    {
        $nations = Nation::withCount([
            'athletes as medalists_count' => function ($query) {
                $query->whereHas('results', function ($q) {
                    $q->whereIn('medal', ['Or', 'Argent', 'Bronze']);
                });
            },
        ])
            ->paginate(10);

        $data = $nations->map(function ($nation) {
            return [
                'nation' => $nation->name,
                'medalists' => $nation->medalists_count,
            ];
        });

        return response()->json([
            'success' => true,
            'message' => 'Nombre de médaillés par pays récupéré avec succès.',
            'data' => $data,
            'pagination' => [
                'current_page' => $nations->currentPage(),
                'last_page' => $nations->lastPage(),
                'per_page' => $nations->perPage(),
                'total' => $nations->total(),
            ],
        ], Response::HTTP_OK);
    }
}
