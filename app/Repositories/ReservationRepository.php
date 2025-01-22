<?php

namespace App\Repositories;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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

    public function me(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->reservation->with(['court.courtImages', 'court.sportType'])->filterBy($request->all());
    }

    public function checkAvailability(array $data) : ?Reservation
    {
        return $this->reservation->where('court_id', $data['court_id'])
            ->where('from_hour', $data['from_hour'])
            ->where('to_hour', $data['to_hour'])
            ->first();
    }
}
