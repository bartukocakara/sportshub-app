<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MatchOwner extends Model
{
    use HasFactory;

    protected $table = 'match_owners';

    protected $fillable = [
        'user_id',
        'match_id',
    ];

    public function scopeFilterBy($query, $filters, array $with)
    {
        return  (new FilterBuilder($query, $filters, $with, 'MatchOwnerFilters'))->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function match()
    {
        return $this->belongsTo(Matches::class);
    }
}
