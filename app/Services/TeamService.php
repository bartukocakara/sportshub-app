<?php

namespace App\Services;

use App\Http\Resources\PlayerTeamResource;
use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\Models\City;
use App\Models\PlayerTeam;
use App\Models\SportType;
use App\Models\Team;
use App\Models\User;
use App\Repositories\CityRepository;
use App\Repositories\PlayerTeamRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
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
        $playerTeamRepository = new PlayerTeamRepository(new PlayerTeam());
        $request->merge(['team_id' => $id]);
        return [
            'players'     => PlayerTeamResource::collection($playerTeamRepository->all($request, ['player']))->response()->getData(true),
            'team'        => $this->teamRepository->find($id, $with),
            'sport_types' => $this->metaDataService->getSportTypes(),
            'cities'      => $this->metaDataService->getCitiesByRequest($request),
        ];
    }

    /**
     * @return array
    */
    public function create(Request $request) : array
    {
        $playerRepostory = new UserRepository(new User());
        return [
            'players'           => UserResource::collection($playerRepostory->all($request, ['userAddresses'] ))
                                            ->response()
                                            ->getData(true),
            'sport_types'       => $this->metaDataService->getSportTypes(),
            'cities'            => $this->metaDataService->getCitiesByRequest(),
            'team_create_selected_players' => session('team_create_selected_players', []),
        ];
    }
}
