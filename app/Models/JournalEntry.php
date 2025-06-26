<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    /** @use HasFactory<\Database\Factories\JournalEntryFactory> */
    use HasFactory;

    protected $fillable = [
        'invoice_id', 'ledger_account_id', 'debit', 'credit', 'description', 'entry_date'
    ];

    protected $casts = [
        'entry_date' => 'date',
    ];
}
