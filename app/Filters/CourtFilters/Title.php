<?php

namespace App\Filters\CourtFilters;

use App\Filters\FilterInterface;

class Title implements FilterInterface
{
    protected $query;

    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Filtreyi uygular.
     *
     * @param string $value
     * @return void
     */
    public function handle($value): void
    {
        $this->query->where(function ($query) use ($value) {
            // Court title veya district/city
            $query->where('title', 'ilike', "%{$value}%")
                // courtBusiness.business_name
                ->orWhereHas('courtBusiness', function ($q) use ($value) {
                    $q->where('name', 'ilike', "%{$value}%");
                })

                // courtAddress içindeki bazı adres alanları
                ->orWhereHas('courtAddress', function ($q) use ($value) {
                    $q->where('street_name', 'ilike', "%{$value}%")
                      ->orWhere('address_detail', 'ilike', "%{$value}%");
                });
        });
    }
}
