<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'city_id',
        'code',
        'title'
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'DistrictFilters'))->apply();
    }

    public function city()
    {
        return $this->belongsTo(City::class)->with('country');
    }

    public function courtAddresses()
    {
        return $this->hasMany(CourtAddress::class, 'district_id');
    }

    public function courtBusinesses()
    {
        return $this->hasMany(CourtBusiness::class, 'district_id');
    }
}
