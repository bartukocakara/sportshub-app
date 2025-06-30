<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    /** @use HasFactory<\Database\Factories\MatchesFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'court_id',
        // 'match_type_id',
        'match_status',
        'sport_type_id',
        // 'field_type_id',
        // 'payment_transaction_id',
        // 'reservation_id',
        // 'field_usage_type',
        'title',
        'price',
        'max_player',
        'min_player',
        'max_team',
        'min_team',
        'description',
        'gender',
        'type',
        'is_court_private',
        'start_date',
        'expiring_date',
        'play_date',
        'from_hour',
        'to_hour'
    ];

    public function scopeFilterBy($query, $filters, array $with = [], bool $useCache = false)
    {
        return  (new FilterBuilder($query, $filters, 'MatchFilters'))->apply($with, $useCache);
    }

}
