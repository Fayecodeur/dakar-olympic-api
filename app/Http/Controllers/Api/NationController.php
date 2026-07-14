<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Nation\StoreNationRequest;
use App\Http\Requests\Nation\UpdateNationRequest;
use App\Http\Resources\Nation\NationResource;
use App\Models\Nation;
use Illuminate\Http\Response;

class NationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nations = Nation::all();

        return NationResource::collection($nations);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNationRequest $request)
    {
        $nation = Nation::create($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Nation créée avec succès.',
            'data' => new NationResource($nation),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Nation $nation)
    {
        return new NationResource($nation);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNationRequest $request, Nation $nation)
    {
        $nation->update($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Nation modifiée avec succès.',
            'data' => new NationResource($nation),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nation $nation)
    {
        $nation->delete();

        return response()->json([
            'success' => true,
            'message' => 'Nation supprimée avec succès.'
        ], Response::HTTP_OK);
    }
}
