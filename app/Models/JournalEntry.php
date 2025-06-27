<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    /** @use HasFactory<\Database\Factories\JournalEntryFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'invoice_id', 'ledger_account_id', 'debit', 'credit', 'description', 'entry_date'
    ];

    protected $casts = [
        'entry_date' => 'date',
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'JournalEntryFilters'))->apply();
    }
}
