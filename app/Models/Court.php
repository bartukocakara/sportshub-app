<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Court extends Model
{
    use HasFactory, UUID;

    protected $table = 'courts';

    protected $fillable = [
        'sport_type_id',
        'title',
        'court_business_id',
    ];

    public function scopeFilterBy($query, $filters, array $with = [], bool $useCache = false)
    {
        return  (new FilterBuilder($query, $filters, 'CourtFilters'))->apply($with, $useCache);
    }

    public function sportType() : BelongsTo
    {
        return $this->belongsTo(SportType::class);
    }

    public function courtAddress() : HasOne
    {
        return $this->hasOne(CourtAddress::class);
    }

    public function courtBusiness() : BelongsTo
    {
        return $this->belongsTo(CourtBusiness::class);
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
