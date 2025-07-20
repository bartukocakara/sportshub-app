<?php

namespace App\Services;

use App\Models\Team;
use App\Models\User;
use App\Models\PlayerTeam;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Resources\TeamResource;
use App\Http\Resources\UserResource;
use App\Repositories\TeamRepository;
use App\Repositories\UserRepository;
use App\Http\Resources\PlayerTeamResource;
use App\Repositories\PlayerTeamRepository;
use Illuminate\Support\Facades\DB;
use App\Aggregates\Team\TeamAggregate;
use App\Loggers\LoggerManager;
use App\Support\Messages\TeamSwalMessages;
use App\ValueObjects\SwalMessage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class TeamService extends CrudService
{
    protected TeamAggregate $teamAggregate;
    protected TeamRepository $teamRepository;
    protected PlayerTeamRepository $playerTeamRepository;
    protected MetaDataService $metaDataService;

    /**
     * Constructor for TeamService.
     *
     * @param TeamAggregate $teamAggregate
     * @param TeamRepository $teamRepository
     * @param PlayerTeamRepository $playerTeamRepository
     * @param MetaDataService $metaDataService
     */
    public function __construct(
        TeamAggregate $teamAggregate,
        TeamRepository $teamRepository,
        PlayerTeamRepository $playerTeamRepository,
        MetaDataService $metaDataService) {
        // IMPORTANT FIX: Call the parent constructor and pass the primary repository
        // for this service (TeamRepository) so CrudService's $this->repository is initialized.
        $this->teamRepository = $teamRepository;
        $this->metaDataService = $metaDataService;
        $this->teamAggregate = $teamAggregate;
        $this->playerTeamRepository = $playerTeamRepository;
        parent::__construct($teamRepository);

        // The explicit assignment $this->teamRepository = $teamRepository; is redundant
        // due to property promotion in PHP 8+, but calling parent::__construct is essential.
    }

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

    /**
     * store
     *
     * @param  array $request
     * @return Model
     */
    public function store(array $params) : Model
    {
        return $this->teamAggregate->creatTeam($params);
    }

    public function delete(string $id): RedirectResponse
    {
        try {
            $team = $this->teamRepository->find($id);

            // Related models üzerinden silme işlemi
            $team->announcements()->delete();
            $team->activities()->delete();
            $team->followers()->delete();

            $team->delete(); // Team'in kendisini sil

            DB::commit();

            // TODO: Delete team images, send notifications...

            return redirect()->route('teams.index')->with('swal', TeamSwalMessages::deletedSuccessfully()->toArray());
        } catch (\Throwable $th) {
            Log::error("message", [$th->getMessage()]);
            // LoggerManager::log('Error deleting team: ', $th->getMessage(), ['user_id' => $id]);

            return redirect()->route('teams.index')->with('swal', TeamSwalMessages::deleteError()->toArray());
        }
    }
}
