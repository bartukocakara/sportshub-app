<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'country_id',
        'code',
        'title'
    ];

    public $timestamps = false;

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'CityFilters'))->apply();
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function districts() : HasMany
    {
        return $this->hasMany(District::class);
    }
}
