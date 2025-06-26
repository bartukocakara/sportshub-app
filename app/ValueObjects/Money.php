<?php

namespace App\ValueObjects;

use InvalidArgumentException;

class Money
{
    public readonly int $amountMinor;

    public readonly string $currency;

    public function __construct(int $amountMinor, string $currency)
    {
        if (!preg_match('/^[A-Z]{3}$/', $currency)) {
            throw new InvalidArgumentException("Invalid currency: $currency");
        }

        $this->amountMinor = $amountMinor;
        $this->currency = $currency;
    }

    public function formatted(): string
    {
        $amount = $this->amountMinor / 100;

        return match ($this->currency){
            'USD' => '$'. number_format($amount, 2),
            'EUR' => '€'. number_format($amount, 2),
            'TRY' => number_format($amount, 2) . ' ₺',
            default => number_format($amount, 2). " " . $this->currency
        };
    }

    public static function fromDecimal(float $amount, string $currency): static
    {
        return new static((int) round($amount * 100), $currency);
    }
}
