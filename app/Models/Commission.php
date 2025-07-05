<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commission extends Model
{
    /** @use HasFactory<\Database\Factories\CommissionFactory> */
    use HasFactory, UUID;

    protected $fillable = [
        'court_business_id',
        'admin_id',
        'percentage',
    ];

    public function scopeFilterBy($query, $filters, array $with = [])
    {
        return  (new FilterBuilder($query, $filters, $with, 'CommissionFilters'))->apply();
    }

    /**
     * Get the court business associated with the commission.
     */
    public function courtBusiness()
    {
        return $this->belongsTo(CourtBusiness::class, 'court_business_id');
    }

    /**
     * Get the admin associated with the commission.
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id');
    }

    /**
     * Calculate the commission based on the amount.
     *
     * @param float $amount
     * @return float
     */
    public function calculateCommission($amount)
    {
        return ($this->percentage / 100) * $amount;
    }
}
