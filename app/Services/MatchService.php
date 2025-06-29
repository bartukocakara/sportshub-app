<?php

namespace App\Services;

use App\Http\Resources\MatchResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\CityRepository;
use App\Repositories\MatchRepository;
use App\Repositories\SportTypeRepository;
use Illuminate\Http\Request;

class MatchService extends CrudService
{
    protected MatchRepository $matchRepository;

    /**
     * @param MatchRepository $matchRepository
     * @return void
    */
    public function __construct(MatchRepository $matchRepository)
    {
        $this->matchRepository = $matchRepository;
        parent::__construct($this->matchRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        $homeData['matches'] = MatchResource::collection($this->matchRepository->all($request, $with))
                                            ->response()
                                            ->getData(true);

        $homeData['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $homeData['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode);
        return $homeData;
    }
}
