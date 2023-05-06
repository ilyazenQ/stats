<?php

namespace App\Http\Actions\Event;

use App\Http\Actions\Action;
use App\Http\DTO\FilterDTO;
use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class GetEventStatsAction implements Action
{
    public function execute(array $request): Collection
    {
        $filterDTO = new FilterDTO(
          $request['name'],
          $request['date_from'],
          $request['date_to'],
          $request['type']
        );

        switch ($filterDTO->type) {
            case 'by_event_name':
                $stats = Event::getCountByEventName($filterDTO);
                break;
            case 'by_ip':
                $stats = Event::getCountByIp($filterDTO);
                break;
            case 'by_auth_status':
                $stats = Event::getCountByAuthStatus($filterDTO);
                break;
            default:
                $stats = [];
                break;
        }

        return $stats;
    }

}