<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, UUID;

    protected $table = 'reservations';

    protected $fillable = [
        'court_status_id',
        'sport_type_id',
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
}
