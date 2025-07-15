<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestTeamMatch extends Model
{
    use HasFactory, UUID;

    protected $table = 'request_team_matches';

    protected $fillable = [
        'requested_user_id',
        'requested_team_id',
        'match_id',
        'status',
        'title',
        'type',
        'expiring_date'
    ];

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'RequestTeamMatchFilters'))->apply();
    }

    public function requestedTeam()
    {
        return $this->belongsTo(Team::class, 'requested_team_id', 'id');
    }

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id', 'id');
    }

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id', 'id');
    }
}
