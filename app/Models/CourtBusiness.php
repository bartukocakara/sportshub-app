<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable

class CourtBusiness extends Authenticatable
{
    use HasFactory, UUID;

    protected $table = 'court_businesses';

    protected $fillable = [
        'name',
        'owner_first_name',
        'owner_last_name',
        'tax_no',
        'phone',
        'email',
        'address',
        'district_id',
        'longitude',
        'latitude',
        'postal_code',
        'standard_price',
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'CourtBusinessFilters'))->apply();
    }

    public function district() : BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    /**
     * Get all comments for the court.
     */
    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function courts(): HasMany
    {
        return $this->hasMany(Court::class);
    }


}
