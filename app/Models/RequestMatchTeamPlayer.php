<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class RequestMatchTeamPlayer extends Model
{
    use HasFactory;

    protected $table = "request_match_team_players";

    protected $fillable = [
        'requested_user_id',
        'match_team_id',
        'status',
        'title',
        'type',
        'expiring_date'
    ];

    protected static function boot()
    {
        parent::boot();
        /**
         * Listen for the creating event on the user model.
         * Sets the 'id' to a UUID using Str::uuid() on the instance being created
         */
        static::creating(function ($model) {
            if ($model->getKey() === null) {
                $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
            }
            $model->requested_user_id = auth()->user()->id;
        });
    }


    // Tells the database not to auto-increment this field
    public function getIncrementing ()
    {
        return false;
    }

    // Helps the application specify the field type in the database
    public function getKeyType ()
    {
        return 'string';
    }

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'RequestMatchTeamPlayerFilters'))->apply();
    }

    public function matchTeam()
    {
        return $this->belongsTo(MatchTeam::class);
    }

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id', 'id');
    }
}
