<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestTeamMatchPlayer extends Model
{
    use HasFactory, UUID;

    protected $table = 'request_team_match_players';

    protected $fillable = [
        'requested_user_id',
        'team_match_id',
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
