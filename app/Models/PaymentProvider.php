<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentProviderFactory> */
    use HasFactory, UUID;

    protected $fillable = ['key', 'name', 'credentials', 'active'];

    protected $casts = [
        'credentials' => 'array',
    ];
}
