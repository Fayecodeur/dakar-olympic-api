<?php

namespace App\Http\Controllers\Api;

use App\Models\Athlete;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Athlete\AthleteResource;
use App\Http\Requests\Athlete\StoreAthleteRequest;
use App\Http\Requests\Athlete\UpdateAthleteRequest;

class AthleteController extends Controller
{
    public function index()
    {
        $athletes = Athlete::with(['nation', 'discipline'])
            ->paginate(20);

        return response()->json([
            'success' => true,
            'message' => 'Athlètes récupérés avec succès.',
            'data' => AthleteResource::collection($athletes),
            'pagination' => [
                'current_page' => $athletes->currentPage(),
                'last_page' => $athletes->lastPage(),
                'per_page' => $athletes->perPage(),
                'total' => $athletes->total(),
            ],
        ], Response::HTTP_OK);
    }


    public function store(StoreAthleteRequest $request)
    {
        $athlete = Athlete::create($request->validated());

        $athlete->load(['nation', 'discipline']);

        return response()->json([
            'success' => true,
            'message' => 'Athlète créé avec succès.',
            'data' => new AthleteResource($athlete),
        ], Response::HTTP_CREATED);
    }


    public function show(Athlete $athlete)
    {
        $athlete->load(['nation', 'discipline']);

        return response()->json([
            'success' => true,
            'message' => 'Athlète récupéré avec succès.',
            'data' => new AthleteResource($athlete),
        ], Response::HTTP_OK);
    }


    public function update(UpdateAthleteRequest $request, Athlete $athlete)
    {
        $athlete->update($request->validated());

        $athlete->load(['nation', 'discipline']);

        return response()->json([
            'success' => true,
            'message' => 'Athlète modifié avec succès.',
            'data' => new AthleteResource($athlete),
        ], Response::HTTP_OK);
    }


    public function destroy(Athlete $athlete)
    {
        $athlete->delete();

        return response()->json([
            'success' => true,
            'message' => 'Athlète supprimé avec succès.',
        ], Response::HTTP_OK);
    }
}
