<?php

namespace App\Http\Actions\Event;

use App\Http\Actions\Action;
use App\Models\Event;

class CreateEventAction implements Action
{
    public function execute(array $request): Event
    {
        return Event::create([
            'name' => $request['name'],
            'is_auth' => $request['is_auth'],
            'ip' => $request['ip'],
        ]);
    }

}