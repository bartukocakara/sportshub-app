<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $table = 'user_addresses';

    protected $fillable = [
        'title',
        'zipcode',
        'street_name',
        'detail',
        'district_id',
        'longitude',
        'latitude',
        'neighborhood',
        'building_number',
        'user_id',
        'status'
    ];


    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'UserAddressFilters'))->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function district()
    {
        return $this->belongsTo(District::class)->with('city');
    }
}
