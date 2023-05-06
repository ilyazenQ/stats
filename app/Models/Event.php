<?php

namespace App\Models;

use App\Http\DTO\FilterDTO;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_auth', 'ip'];

    static array $availableAggregation = [
        'by_ip',
        'by_auth_status',
        'by_event_name'
    ];

    public function scopeFilter($query, FilterDTO $filterDTO)
    {
        $query->where('name', '=',$filterDTO->name)
               ->whereDate('created_at', '>=', $filterDTO->dateFrom)
               ->whereDate('created_at', '<=', $filterDTO->dateTo);

        return $query;
    }

    public static function getCountByEventName(FilterDTO $filterDTO)
    {
        return self::filter($filterDTO)
            ->selectRaw('name, count(*) as count')
            ->groupBy('name')
            ->get();
    }

    public static function getCountByIp(FilterDTO $filterDTO)
    {
        return self::filter($filterDTO)
            ->selectRaw('ip, count(*) as count')
            ->groupBy('ip')
            ->get();
    }

    public static function getCountByAuthStatus(FilterDTO $filterDTO)
    {
        return self::filter($filterDTO)
            ->selectRaw('is_auth, count(*) as count')
            ->groupBy('is_auth')
            ->get();
    }
}
