<?php

namespace App\Services;

use App\Services\CrudService;
use App\Repositories\CourtReservationPricingRepository;
use Illuminate\Http\Request;

class CourtReservationPricingService extends CrudService
{
    protected CourtReservationPricingRepository $courtReservationPricingRepository;

    public function __construct(CourtReservationPricingRepository $courtReservationPricingRepository)
    {
        $this->courtReservationPricingRepository = $courtReservationPricingRepository;
        parent::__construct($this->courtReservationPricingRepository);
    }
    
    public function checkAvailablitiy(Request $request)
    {
        return $this->courtReservationPricingRepository->checkAvailablitiy($request);
    }
    public function updateOrCreate(array $params)
    {
        $this->courtReservationPricingRepository->updateOrCreate(['court_id' => $params['court_id'], 'day_of_week' => $params['day_of_week']], $params);
    }
}
