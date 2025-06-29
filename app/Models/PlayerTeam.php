<?php

namespace App\Models;

use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerTeam extends Model
{
    use HasFactory, UUID;

    protected $table = 'player_teams';

    protected $fillable = [
        'user_id',
        'team_id',
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'PlayerTeamFilters'))->apply();
    }

    public function player()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
