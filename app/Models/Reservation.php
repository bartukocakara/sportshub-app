<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, UUID;

    protected $table = 'reservations';

    protected $fillable = [
        'title',
        'user_id',
        'court_id',
        'code',
        'payment_status',
        'from_hour',
        'to_hour',
        'date',
        'price',
        'customer_name',
        'customer_email',
        'customer_phone'
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'ReservationFilters'))->apply();
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }
}
