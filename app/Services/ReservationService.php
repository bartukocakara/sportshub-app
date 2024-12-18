<?php

namespace App\Services;

use App\Repositories\ReservationRepository;

class ReservationService extends CrudService
{
    protected ReservationRepository $reservationRepository;

    /**
     * @param ReservationRepository $reservationRepository
     * @return void
    */
    public function __construct(ReservationRepository $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
        parent::__construct($this->reservationRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
