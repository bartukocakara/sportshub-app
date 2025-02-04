<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public function court() : BelongsTo
    {
        return $this->belongsTo(Court::class);
    }

    public function district() : BelongsTo
    {
        return $this->belongsTo(District::class);
    }

}
