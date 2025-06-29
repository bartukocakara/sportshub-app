<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /** @use HasFactory<\Database\Factories\TeamFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'sport_type_id',
        'city_id',
        'title',
        'team_status',
        'player_count',
        'gender',
        'min_player',
        'max_player'
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'TeamFilters'))->apply();
    }

    const DEFAULT_PLAYER_COUNT = 1;
}
