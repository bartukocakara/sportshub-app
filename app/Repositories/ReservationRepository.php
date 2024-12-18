<?php

namespace App\Repositories;

use App\Models\Reservation;

class ReservationRepository extends BaseRepository
{
    protected Reservation $reservation;

    /**
     * @param Reservation $reservation
     * @return void
    */
    public function __construct(Reservation $reservation)
    {
        parent::__construct($reservation);
        $this->reservation = $reservation;
    }
}
