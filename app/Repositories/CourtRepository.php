<?php

namespace App\Repositories;

use App\Models\Court;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CourtRepository extends BaseRepository
{
    protected Court $court;

    /**
     * @param Court $court
     * @return void
    */
    public function __construct(Court $court)
    {
        parent::__construct($court);
        $this->court = $court;
    }

    public function home(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->court->with(['sportType',
                                   'courtBusiness',
                                   'courtAddress',
                                   'courtImages',
                                   'courtReservationPricings',
                                   'reservations'
                                   ])
                            ->filterBy($request->all());
    }

    public function checkout(string $id) : Court
    {
        return $this->court->with(['sportType',
                                   'courtBusiness.district.city',
                                   'courtImages',
                                   'courtReservationPricings',
                                   'reservations'
                                   ])->findOrFail($id);
    }
}
