<?php

namespace App\Models;

use App\Traits\UUID;
use App\Filters\FilterBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserSportType extends Model
{
    use HasFactory;

    protected $table = "user_sport_types";

    protected $fillable = [
        'user_id',
        'sport_type_id'
    ];

    public $timestamps = false;

    public function scopeFilterBy($query, $filters, array $with)
    {
        return  (new FilterBuilder($query, $filters, $with, 'PlayerSportTypeFilters'))->apply();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sportType()
    {
        return $this->belongsTo(SportType::class);
    }
}
