<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'country_id',
        'code',
        'title'
    ];

    public $timestamps = false;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
