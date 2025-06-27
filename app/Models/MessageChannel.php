<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageChannel extends Model
{
    /** @use HasFactory<\Database\Factories\MessageChannelFactory> */
    use HasFactory, UUID;

    protected $fillable = ['key', 'name', 'config', 'active'];
    protected $casts = ['config' => 'array'];
}
