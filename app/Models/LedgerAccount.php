<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LedgerAccount extends Model
{
    /** @use HasFactory<\Database\Factories\LedgerAccountFactory> */
    use HasFactory;

    protected $fillable = ['code', 'name', 'type'];
}
