<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable; // Import Authenticatable

class CourtBusiness extends Authenticatable
{
    use HasFactory, UUID;

    protected $table = 'court_businesses';

    protected $fillable = [
        'name',
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

}
