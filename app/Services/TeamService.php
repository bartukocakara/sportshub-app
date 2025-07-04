<?php

namespace App\Services;

use App\Http\Resources\TeamResource;
use App\Models\City;
use App\Models\SportType;
use App\Models\Team;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TeamRepository;
use Illuminate\Http\Request;

class TeamService extends CrudService
{

    /**
     * @param TeamRepository $teamRepository
     * @return void
    */
    public function __construct(
        protected TeamRepository $teamRepository,
        protected MetaDataService $metaDataService
    ) {}

    public function index(Request $request, array $with = []) : array
    {
        return [
            'teams'       => TeamResource::collection(
                                $this->teamRepository->all($request, $with)
                            )->response()->getData(true),

            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    public function profile(Request $request, string $id, array $with = []) : array
    {
        return [
            'team'        => $this->teamRepository->find($id, $with),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    /**
     * @return array
    */
    public function create() : array
    {
         return [
            'players' => [],
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest(),
        ];
    }
}
