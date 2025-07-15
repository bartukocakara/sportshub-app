<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestCreateCourt extends Model
{
    use HasFactory;

    protected $table = 'request_create_courts';

    protected $fillable = [
        'status',
        'requested_user_id',
        'court_id',
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

    public function getIncrementing ()
    {
        return false;
    }

    public function getKeyType ()
    {
        return 'string';
    }

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'RequestCreateCourtFilters'))->apply();
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

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
