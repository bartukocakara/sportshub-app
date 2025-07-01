<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegratedChannel extends Model
{
    /** @use HasFactory<\Database\Factories\IntegratedChannelFactory> */
    use HasFactory, UUID;

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'IntegratedChannelFilters'))->apply();
    }
}
