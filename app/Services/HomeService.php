<?php

namespace App\Services;

use App\Http\Resources\CourtResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\CityRepository;
use App\Repositories\CourtRepository;
use App\Repositories\SportTypeRepository;
use Illuminate\Http\Request;

class HomeService extends CrudService
{
    protected CourtRepository $courtRepository;

    /**
     * @param CourtRepository $CourtRepository
     * @return void
    */
    public function __construct(CourtRepository $courtRepository)
    {
        $this->courtRepository = $courtRepository;
        parent::__construct($this->courtRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request) : array
    {
        $homeData['courts'] = CourtResource::collection($this->courtRepository->home($request))
                                            ->response()
                                            ->getData(true);

        $homeData['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $homeData['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode);
        return $homeData;
    }
}
