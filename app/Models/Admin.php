<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\AdminFactory> */
    use HasFactory, UUID;

    protected $guard = 'admin';

    protected $table = 'admins';

    protected $fillable = [
        'name', // Court business ID to link with the business
        'email', // The balance of the account
        'password'
    ];
}
