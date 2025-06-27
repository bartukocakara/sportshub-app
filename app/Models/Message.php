<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'type', 'recipient', 'subject', 'body', 'meta', 'status',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
