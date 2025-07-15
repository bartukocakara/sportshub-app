<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestMatch extends Model
{
    use HasFactory;

    protected $table = 'request_matches';

    protected $fillable = [
        'status',
        'user_id',
        'match_id',
        'title',
        'expiring_date'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($query) {
            if ($query->getKey() === null) {
                $query->setAttribute($query->getKeyName(), Str::uuid()->toString());
            }
            $query->requested_user_id = auth()->user()->id; //
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
        return  (new FilterBuilder($query, $filters,  $with, 'RequestMatchFilters'))->apply();
    }

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function match()
    {
        return $this->belongsTo(Matches::class);
    }
}
