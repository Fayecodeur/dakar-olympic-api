<?php

namespace App\Http\Controllers\Api;

use App\Models\Result;
use App\Models\Athlete;
use App\Models\Event;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Result\ResultResource;
use App\Http\Requests\Result\StoreResultRequest;
use App\Http\Requests\Result\UpdateResultRequest;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with(['athlete', 'event'])->get();

        return response()->json([
            'success' => true,
            'message' => 'Résultats récupérés avec succès.',
            'data' => ResultResource::collection($results),
        ], Response::HTTP_OK);
    }


    public function store(StoreResultRequest $request)
    {
        $athlete = Athlete::findOrFail($request->athlete_id);
        $event = Event::findOrFail($request->event_id);


        // Vérification de la discipline
        if ($athlete->discipline_id !== $event->discipline_id) {
            return response()->json([
                'success' => false,
                'message' => 'Cet athlète ne participe pas à cette discipline.',
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        // Vérification de la position
        $positionExists = Result::where('event_id', $request->event_id)
            ->where('position', $request->position)
            ->exists();

        if ($positionExists) {
            return response()->json([
                'success' => false,
                'message' => "La position {$request->position} est déjà attribuée pour cette épreuve.",
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }


        $result = Result::create([
            'position' => $request->position,
            'medal' => $this->getMedal($request->position),
            'athlete_id' => $request->athlete_id,
            'event_id' => $request->event_id,
        ]);


        $result->load(['athlete', 'event']);


        return response()->json([
            'success' => true,
            'message' => 'Résultat enregistré avec succès.',
            'data' => new ResultResource($result),
        ], Response::HTTP_CREATED);
    }


    public function show(Result $result)
    {
        $result->load(['athlete', 'event']);

        return response()->json([
            'success' => true,
            'message' => 'Résultat récupéré avec succès.',
            'data' => new ResultResource($result),
        ], Response::HTTP_OK);
    }


    public function update(UpdateResultRequest $request, Result $result)
    {
        if ($request->has('position')) {

            $positionExists = Result::where('event_id', $result->event_id)
                ->where('position', $request->position)
                ->where('id', '!=', $result->id)
                ->exists();

            if ($positionExists) {
                return response()->json([
                    'success' => false,
                    'message' => "La position {$request->position} est déjà attribuée pour cette épreuve.",
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }
        }


        $result->update($request->validated());


        if ($request->has('position')) {
            $result->update([
                'medal' => $this->getMedal($result->position),
            ]);
        }


        $result->load(['athlete', 'event']);

        return response()->json([
            'success' => true,
            'message' => 'Résultat modifié avec succès.',
            'data' => new ResultResource($result),
        ], Response::HTTP_OK);
    }


    public function destroy(Result $result)
    {
        $result->delete();

        return response()->json([
            'success' => true,
            'message' => 'Résultat supprimé avec succès.',
        ], Response::HTTP_OK);
    }


    private function getMedal(int $position): ?string
    {
        return match ($position) {
            1 => 'Or',
            2 => 'Argent',
            3 => 'Bronze',
            default => null,
        };
    }
}
