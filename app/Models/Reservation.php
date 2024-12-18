<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, UUID;

    protected $table = 'reservations';

    protected $fillable = [
        'id',
        'title',
        'user_id',
        'court_id',
        'code',
        'from_hour',
        'to_hour',
        'date',
        'price',
    ];
}
