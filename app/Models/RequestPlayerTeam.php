<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestPlayerTeam extends Model
{
    use HasFactory, UUID;

    protected $table = 'request_player_teams';

    protected $fillable = [
        'requested_user_id',
        'team_id',
        'status',
        'title',
        'type',
        'expiring_date'
    ];

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'RequestPlayerTeamFilters'))->apply();
    }

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id', 'id');
    }

    public function receivers()
    {
        return $this->morphMany(RequestReceiver::class, 'requestable');
    }
}
