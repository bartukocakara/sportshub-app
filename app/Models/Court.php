<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Court extends Model
{
    use HasFactory, UUID;

    protected $table = 'courts';

    protected $fillable = [
        'sport_type_id',
        'court_status_id',
        'title',
        'is_private',
        'court_business_id',
        'zipcode',
        'street_name',
        'address_detail',
        'district_id',
        'longitude',
        'latitude',
        'neighborhood',
        'building_number',
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'CourtFilters'))->apply();
    }

    public function sportType() : BelongsTo
    {
        return $this->belongsTo(SportType::class);
    }

    public function courtBusiness() : BelongsTo
    {
        return $this->belongsTo(CourtBusiness::class);
    }

    public function district() : BelongsTo
    {
        return $this->belongsTo(District::class);
    }

    public function courtImages() : HasMany
    {
        return $this->hasMany(CourtImage::class);
    }

    public function courtReservationPricings() : HasMany
    {
        return $this->hasMany(CourtReservationPricing::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
