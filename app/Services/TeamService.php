<?php

namespace App\Services;

use App\Http\Resources\TeamResource;
use App\Models\City;
use App\Models\SportType;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;

class TeamService extends CrudService
{
    protected TeamRepository $teamRepository;

    /**
     * @param TeamRepository $teamRepository
     * @return void
    */
    public function __construct(TeamRepository $teamRepository)
    {
        $this->teamRepository = $teamRepository;
        parent::__construct($this->teamRepository); // Crud işlemleri yoksa kaldırınız.
    }

    public function index(Request $request, array $with = []) : array
    {
        $homeData['teams'] = TeamResource::collection($this->teamRepository->all($request, $with))
                                            ->response()
                                            ->getData(true);

        $homeData['sport_types'] = (new SportTypeRepository(new SportType()))->home();
        $language = $request->server('HTTP_ACCEPT_LANGUAGE');
        $countryCode = substr($language, 3, 2); // Extract country code (e.g., 'US' for 'en-US')
        $homeData['cities'] = (new CityRepository(new City()))->getByCountryCode($countryCode);
        return $homeData;
    }
}
