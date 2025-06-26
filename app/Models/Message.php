<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /** @use HasFactory<\Database\Factories\MessageFactory> */
    use HasFactory;

    protected $fillable = [
        'type', 'recipient', 'subject', 'body', 'meta', 'status',
    ];

    protected $casts = [
        'meta' => 'array',
    ];
}
