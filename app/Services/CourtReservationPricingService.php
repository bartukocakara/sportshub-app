<?php

namespace App\Services;

use App\Repositories\CourtReservationPricingRepository;

class CourtReservationPricingService extends CrudService
{
    protected CourtReservationPricingRepository $courtReservationPricingRepository;

    /**
     * @param CourtReservationPricingRepository $courtReservationPricingRepository
     * @return void
    */
    public function __construct(CourtReservationPricingRepository $courtReservationPricingRepository)
    {
        $this->courtReservationPricingRepository = $courtReservationPricingRepository;
        parent::__construct($this->courtReservationPricingRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
