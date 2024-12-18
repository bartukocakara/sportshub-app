<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'city_id',
        'code',
        'title'
    ];

    public function city()
    {
        return $this->belongsTo(City::class)->with('country');
    }
}
