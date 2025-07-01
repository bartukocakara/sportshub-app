<?php

namespace App\Models;

use App\Enums\ReservationPaymentStatusEnum;
use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory, UUID;

    protected $table = 'reservations';

    protected $fillable = [
        'title',
        'user_id',
        'court_id',
        'code',
        'payment_status',
        'status',
        'from_hour',
        'to_hour',
        'date',
        'price',
        'customer_name',
        'customer_email',
        'customer_phone'
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'ReservationFilters'))->apply($with);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function court()
    {
        return $this->belongsTo(Court::class);
    }

    public function sportType()
    {
        return $this->belongsTo(SportType::class);
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
    }
}
