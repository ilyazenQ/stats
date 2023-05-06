<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function save(Request $request)
    {
        $event = Event::create([
            'name' => $request->input('name'),
            'is_auth' => $request->input('is_auth', false),
            'ip' => $request->ip(),
        ]);

        return response()->json($event);
    }

    public function getStats(Request $request)
    {
        $filters = [
            'name' => $request->input('name'),
            'date_from' => $request->input('date_from'),
            'date_to' => $request->input('date_to'),
        ];

        $type = $request->input('type');

        switch ($type) {
            case 'by_event_name':
                $stats = Event::getCountByEventName($filters);
                break;
            case 'by_ip':
                $stats = Event::getCountByIp($filters);
                break;
            case 'by_auth_status':
                $stats = Event::getCountByAuthStatus($filters);
                break;
            default:
                $stats = [];
                break;
        }

        return response()->json($stats);
    }
}
