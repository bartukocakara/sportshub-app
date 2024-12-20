<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /** @use HasFactory<\Database\Factories\AccountFactory> */
    use HasFactory, UUID;

    protected $table = 'accounts';

    protected $fillable = [
        'court_business_id', // Court business ID to link with the business
        'balance', // The balance of the account
    ];
}
