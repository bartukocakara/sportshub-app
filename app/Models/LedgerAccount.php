<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerAccount extends Model
{
    /** @use HasFactory<\Database\Factories\LedgerAccountFactory> */
    use HasFactory, UUID;

    protected $fillable = ['code', 'name', 'type'];
}
