<?php

namespace App\Repositories;

use App\Models\CourtReservationPricing;

class CourtReservationPricingRepository extends BaseRepository
{
    protected CourtReservationPricing $courtReservationPricing;

    /**
     * @param CourtReservationPricing $courtReservationPricing
     * @return void
    */
    public function __construct(CourtReservationPricing $courtReservationPricing)
    {
        parent::__construct($courtReservationPricing);
        $this->courtReservationPricing = $courtReservationPricing;
    }
}
