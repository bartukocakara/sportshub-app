<?php

namespace App\Services;

use App\Http\Resources\ReservationResource;
use App\Repositories\ReservationRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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

    public function me(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->reservationRepository->me($request);
    }
}
