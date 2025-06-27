<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionPlanFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'id',
        'name',
        'interval',
        'currency',
        'amount_minor',
        'description',
        'active',
        'features',
    ];

    protected $casts = [
        'active' => 'boolean',
        'features' => 'array', // Automatically decode JSON features
    ];
    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'SubscriptionPlanFilters'))->apply();
    }
}
