<?php

namespace App\Models;

use App\Filters\FilterBuilder;
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

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'AccountFilters'))->apply();
    }

    /**
     * Get the court business that owns the account.
     */
    public function courtBusiness()
    {
        return $this->belongsTo(CourtBusiness::class);
    }
}
