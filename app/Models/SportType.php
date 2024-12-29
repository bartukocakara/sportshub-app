<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportType extends Model
{
    /** @use HasFactory<\Database\Factories\SportTypeFactory> */
    use HasFactory, UUID;

    protected $table = 'sport_types';

    protected $fillable = [
        'path',
        'title',
        'description',
        'active',
        'img'
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'SportTypeFilters'))->apply();
    }
}
