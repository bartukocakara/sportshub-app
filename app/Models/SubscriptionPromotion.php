<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPromotion extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionPromotionFactory> */
    use HasFactory;

    protected $fillable = ['code', 'type', 'amount', 'applies_to', 'valid_until'];

}
