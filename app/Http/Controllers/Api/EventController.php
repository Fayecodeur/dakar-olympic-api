<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Event\IndexEventRequest;
use App\Http\Requests\Event\StoreEventRequest;
use App\Http\Requests\Event\UpdateEventRequest;
use App\Http\Resources\Event\EventResource;
use App\Models\Event;
use Illuminate\Http\Response;
use App\Http\Resources\Result\ResultResource;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(IndexEventRequest $request)
    {
        $eventDate = null;

        if ($request->filled('event_date')) {
            $eventDate = \Carbon\Carbon::createFromFormat(
                'd-m-Y',
                $request->event_date
            )->format('Y-m-d');
        }

        $events = Event::with('discipline')
            ->when($eventDate, function ($query) use ($eventDate) {
                $query->whereDate('event_date', $eventDate);
            })
            ->when($request->discipline_id, function ($query) use ($request) {
                $query->where('discipline_id', $request->discipline_id);
            })
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Épreuves récupérées avec succès.',
            'data' => EventResource::collection($events),
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventRequest $request)
    {
        $event = Event::create($request->validated());

        $event->load('discipline');

        return response()->json([
            'success' => true,
            'message' => 'Épreuve créée avec succès.',
            'data' => new EventResource($event),
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        $event->load('discipline');

        return response()->json([
            'success' => true,
            'message' => 'Épreuve récupérée avec succès.',
            'data' => new EventResource($event),
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        $event->update($request->validated());

        $event->load('discipline');

        return response()->json([
            'success' => true,
            'message' => 'Épreuve modifiée avec succès.',
            'data' => new EventResource($event),
        ], Response::HTTP_OK);
    }

    public function podium(Event $event)
    {
        $results = $event->results()
            ->with('athlete')
            ->orderBy('position')
            ->limit(3)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Podium récupéré avec succès.',
            'data' => ResultResource::collection($results),
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return response()->json([
            'success' => true,
            'message' => 'Épreuve supprimée avec succès.',
        ], Response::HTTP_OK);
    }
}
