<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestMatchTeam extends Model
{
    use HasFactory, UUID;

    protected $table = 'request_match_teams';

    protected $fillable = [
        'requested_user_id',
        'requested_team_id',
        'match_id',
        'status',
        'title',
        'type',
        'expiring_date'
    ];

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id', 'id');
    }
}
