<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtAddress extends Model
{
    /** @use HasFactory<\Database\Factories\CourtAddressFactory> */
    use HasFactory, UUID;

    protected $table = 'court_addresses';

    protected $fillable = [
        'court_id',
        'street_name',
        'address_detail',
        'district_id',
        'longitude',
        'latitude',
        'neighborhood',
        'building_number',
    ];
}
