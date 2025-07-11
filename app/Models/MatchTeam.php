<?php

namespace App\Models;

use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchTeam extends Model
{
    use HasFactory, UUID;

    protected $table = 'match_teams';

    protected $fillable = [
        'match_id',
        'title'
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'MatchTeamFilters'))->apply();
    }

    public function matchTeamPlayers()
    {
        return $this->hasMany(MatchTeamPlayer::class, 'match_team_id', 'id');
    }

    // public function requestMatchTeamPlayers()
    // {
    //     return $this->hasMany(RequestMatchTeamPlayer::class, 'match_team_player_id', 'id');
    // }

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id', 'id');
    }

}
