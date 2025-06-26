<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MessageChannel extends Model
{
    /** @use HasFactory<\Database\Factories\MessageChannelFactory> */
    use HasFactory;

    protected $fillable = ['key', 'name', 'config', 'active'];
    protected $casts = ['config' => 'array'];
}
