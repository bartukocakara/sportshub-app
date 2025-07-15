<?php

namespace App\Models;

use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RequestSportType extends Model
{
    use HasFactory, UUID;

    protected $table = 'request_sport_types';

    protected $fillable = [
        'requested_user_id',
        'sport_type_id',
        'status',
        'title',
        'expiring_date'
    ];

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'RequestSportTypeFilters'))->apply();
    }

    public function requestedUser()
    {
        return $this->belongsTo(User::class, 'requested_user_id', 'id');
    }
}
