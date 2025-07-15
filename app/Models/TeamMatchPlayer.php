<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamMatchPlayer extends Model
{
    use HasFactory, UUID;

    protected $table = 'team_match_players';

    protected $fillable = [
        'user_id',
        'team_match_id',
        'team_match_player_status_id'
    ];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
