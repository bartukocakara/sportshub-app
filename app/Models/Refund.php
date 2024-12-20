<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refund extends Model
{
    /** @use HasFactory<\Database\Factories\RefundFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'payment_id',
        'refund_amount',
        'refund_reason',
        'status',
        'refunded_at',
    ];
}
