<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourtBusiness extends Model
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
}
