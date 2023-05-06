<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'is_auth', 'ip'];

    public function scopeFilter($query, array $filters)
    {
        if (isset($filters['name'])) {
            $query->where('name', '=',$filters['name']);
        }

        if (isset($filters['date_from'])) {
            $query->whereDate('created_at', '>=', $filters['date_from']);
        }

        if (isset($filters['date_to'])) {
            $query->whereDate('created_at', '<=', $filters['date_to']);
        }

        return $query;
    }

    public static function getCountByEventName(array $filters)
    {
        return self::filter($filters)
            ->selectRaw('name, count(*) as count')
            ->groupBy('name')
            ->get();
    }

    public static function getCountByIp(array $filters)
    {
        return self::filter($filters)
            ->selectRaw('ip, count(*) as count')
            ->groupBy('ip')
            ->get();
    }

    public static function getCountByAuthStatus(array $filters)
    {
        return self::filter($filters)
            ->selectRaw('is_auth, count(*) as count')
            ->groupBy('is_auth')
            ->get();
    }
}
