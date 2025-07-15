<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchTeamPlayer extends Model
{
    use HasFactory, UUID;

    protected $table = 'match_team_players';

    protected $fillable = [
        'user_id',
        'match_team_id',
        'match_team_player_status_id'
    ];

    public $timestamps = false;

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'MatchTeamPlayerFilters'))->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function matchTeam()
    {
        return $this->belongsTo(MatchTeam::class, 'match_team_id', 'id');
    }

    // public function matchOwner()
    // {
    //     return $this->belongsTo(MatchOwner::class, 'match_id', 'match_id');
    // }

    public function getMatchTeamPlayerStatusTextAttribute(): string
    {
        return $this->statusDefinition->description_tr ?? 'Bilinmiyor';
    }

    public function getStatusBadgeAttribute(): string
    {
        return match ($this->participant_status) {
            'pending'   => 'badge-light-warning',
            'confirmed' => 'badge-light-success',
            'completed' => 'badge-light-info',
            'canceled'  => 'badge-light-danger',
            default     => 'badge-light-secondary',
        };
    }
}
