<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'causer_id',
        'type',
        'subject_type',
        'subject_id',
        'properties',
        'is_public',
        'activity_at',
    ];

    protected $casts = [
        'properties' => 'array',
        'is_public' => 'boolean',
        'activity_at' => 'datetime',
    ];

    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    public function causer()
    {
        return $this->belongsTo(User::class, 'causer_id');
    }


    public function scopeFilterBy($query, $filters, array $with = [], bool $useCache = false)
    {
        return  (new FilterBuilder($query, $filters, 'ActivityFilters'))->apply($with, $useCache);
    }
}
