<?php

namespace App\Models;

use App\Traits\UUID;
use App\ValueObjects\Money;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\PaymentTransactionFactory> */
    use HasFactory, UUID;

    /**
     * getMoneyAttribute
     * usage example : $transaction->money->formatted(); // "$5.00" or "₺120.50"
     * @return Money
     */
    public function getMoneyAttribute(): Money
    {
        return new Money($this->amount_minor, $this->currency);
    }
}
