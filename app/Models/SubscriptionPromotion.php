<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPromotion extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionPromotionFactory> */
    use HasFactory, UUID;

    protected $fillable = ['code', 'type', 'amount', 'applies_to', 'valid_until'];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'SubscriptionPromotionFilters'))->apply();
    }
}
