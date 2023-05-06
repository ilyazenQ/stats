<?php

namespace App\Http\Controllers;

use App\Http\Actions\Event\CreateEventAction;
use App\Http\Actions\Event\GetEventStatsAction;
use App\Http\Requests\Event\CreateEventRequest;
use App\Http\Requests\Event\GetEventStatsRequest;

class EventController extends Controller
{
    public function save(CreateEventRequest $request, CreateEventAction $action)
    {

        return response()->json([
            'code' => 201,
            'data' => $action->execute($request->validated())], 201);
    }

    public function getStats(GetEventStatsRequest $request, GetEventStatsAction $action)
    {
        return response()->json([
            'code' => 200,
            'data' => $action->execute($request->validated())]);
    }
}
