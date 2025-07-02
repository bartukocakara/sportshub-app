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
    protected const DEFAULT_PLAYER_COUNT = 1;

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

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'TeamFilters'))->apply();
    }
    public function users()
    {
        return $this->belongsToMany(User::class, 'player_teams', 'team_id', 'user_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function sportType()
    {
        return $this->belongsTo(SportType::class);
    }

    public function statusDefinition()
    {
        return $this->belongsTo(Definition::class, 'team_status', 'value')
            ->where('group_key', 'team_status');
    }

    public function getTeamStatusTextAttribute(): string
    {
        return $this->statusDefinition->description_tr ?? 'Bilinmiyor';
    }

    public function getCityTitleAttribute(): string
    {
        return $this->city->title ?? 'Bilinmiyor';
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->team_status) {
            'active'   => 'badge-light-success',
            'inactive' => 'badge-light-warning',
            'banned'   => 'badge-light-danger',
            default    => 'badge-light-secondary',
        };
    }
}
