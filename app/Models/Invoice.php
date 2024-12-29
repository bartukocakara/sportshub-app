<?php

namespace App\Models;

use App\Filters\FilterBuilder;
use App\Traits\UUID;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory, UUID;

    protected $fillable = [
        'court_business_id',
        'admin_id',
        'amount',
        'due_date',
        'status',
    ];

    public function scopeFilterBy($query, $filters)
    {
        return  (new FilterBuilder($query, $filters, 'InvoiceFilters'))->apply();
    }

    // Define the relationship with CourtBusiness
    public function courtBusiness()
    {
        return $this->belongsTo(CourtBusiness::class);
    }

    // Define the relationship with User (the payer)
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
