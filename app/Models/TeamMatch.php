<?php

namespace App\Models;

use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMatch extends Model
{
    use HasFactory, UUID;

    protected $table = 'team_matches';

    protected $fillable = [
        'match_id',
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id', 'id');
    }

    public function players()
    {
        return $this->hasMany(TeamMatchPlayer::class, 'team_match_id', 'id');
    }

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters,$with, 'TeamMatchFilters'))->apply();
    }

    public function teamLeaders()
    {
        return $this->hasMany(TeamLeader::class, 'team_id', 'team_id');
    }


    public function requestTeamMatches()
    {
        return $this->hasOne(RequestTeamMatch::class, 'team_match_id', 'id')
            ->whereHas('teamMatch.teamLeaders', function ($query) {
                $query->where('user_id', auth()->user()->id);
            });
    }
}
