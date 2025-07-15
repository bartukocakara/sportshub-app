<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestReceiver extends Model
{
    use HasFactory, UUID;

    protected $table = 'request_receivers';

    protected $fillable = [
        'receiver_user_id',
        'requestable_id',
        'requestable_type',
        'name'
    ];

    public function scopeFilterBy($query, $filters, array $with = [] )
    {
        return  (new FilterBuilder($query, $filters, $with, 'RequestReceiverFilters'))->apply();
    }

    public function requestable()
    {
        return $this->morphTo();
    }
}
