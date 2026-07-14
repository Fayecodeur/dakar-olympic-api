<?php

namespace App\Http\Controllers\Api;

use App\Models\Discipline;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Http\Resources\Discipline\DisciplineResource;
use App\Http\Requests\Discipline\StoreDisciplineRequest;
use App\Http\Requests\Discipline\UpdateDisciplineRequest;

class DisciplineController extends Controller
{
    public function index()
    {
        $disciplines = Discipline::all();

        return response()->json([
            'success' => true,
            'message' => 'Disciplines récupérées avec succès.',
            'data' => DisciplineResource::collection($disciplines),
        ], Response::HTTP_OK);
    }

    public function store(StoreDisciplineRequest $request)
    {
        $discipline = Discipline::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Discipline créée avec succès.',
            'data' => new DisciplineResource($discipline),
        ], Response::HTTP_CREATED);
    }

    public function show(Discipline $discipline)
    {
        return response()->json([
            'success' => true,
            'message' => 'Discipline récupérée avec succès.',
            'data' => new DisciplineResource($discipline),
        ], Response::HTTP_OK);
    }

    public function update(UpdateDisciplineRequest $request, Discipline $discipline)
    {
        $discipline->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Discipline modifiée avec succès.',
            'data' => new DisciplineResource($discipline),
        ], Response::HTTP_OK);
    }

    public function destroy(Discipline $discipline)
    {
        $discipline->delete();

        return response()->json([
            'success' => true,
            'message' => 'Discipline supprimée avec succès.',
        ], Response::HTTP_OK);
    }
}
