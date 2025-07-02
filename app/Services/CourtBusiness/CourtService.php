<?php

namespace App\Services\CourtBusiness;

use App\Http\Resources\CourtResource;
use App\Models\City;
use App\Models\Court;
use App\Models\SportType;
use App\Repositories\CityRepository;
use App\Repositories\CourtRepository;
use App\Repositories\SportTypeRepository;
use Illuminate\Http\Request;

class CourtService
{
    public CourtRepository $courtRepository;

    public function __construct(private CourtRepository $repository)
    {
        $this->repository = $repository;
    }

    public function all(Request $request)
    {
        $request->merge(['user_type' => 'court_business']);
        $datas['courts'] = CourtResource::collection($this->repository->getByCourtBusiness($request))
                                            ->response()
                                            ->getData(true);
        $datas['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $datas['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode);
        return $datas;
    }
}
