<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionFactory> */
    use HasFactory, UUID;

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'SubscriptionFilters'))->apply();
    }
}
