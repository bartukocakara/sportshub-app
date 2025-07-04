<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentFactory> */
    use HasFactory, UUID;

    protected $table = 'payments';

    protected $fillable = [
        'reservation_id',
        'payment_method',
        'transaction_id',
        'amount',
        'currency',
        'status',
        'paid_at',
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with,'PaymentFilters'))->apply();
    }

    public function reservation() {
        return $this->belongsTo(Reservation::class);
    }
}
