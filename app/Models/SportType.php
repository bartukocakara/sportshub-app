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

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'SportTypeFilters'))->apply();
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_sport_types', 'sport_type_id', 'user_id');
    }

    public function userCount()
    {
        return $this->users()->count();
    }
}
