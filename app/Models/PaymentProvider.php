<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentProvider extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentProviderFactory> */
    use HasFactory;

    protected $fillable = ['key', 'name', 'credentials', 'active'];

    protected $casts = [
        'credentials' => 'array',
    ];
}
