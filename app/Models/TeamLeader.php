<?php

namespace App\Models;

use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamLeader extends Model
{
    use HasFactory;

    protected $table = 'team_leaders';

    protected $fillable = [
        'user_id',
        'team_id',
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'TeamLeaderFilters'))->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
