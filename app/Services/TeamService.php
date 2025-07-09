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

class TeamService extends CrudService
{
    /**
     * Constructor for TeamService.
     *
     * @param TeamRepository $teamRepository The repository for Team model. This will also be passed to the parent CrudService.
     * @param PlayerTeamRepository $playerTeamRepository The repository for PlayerTeam model.
     * @param MetaDataService $metaDataService The service for metadata operations.
     */
    public function __construct(
        protected TeamRepository $teamRepository,
        protected PlayerTeamRepository $playerTeamRepository,
        protected MetaDataService $metaDataService
    ) {
        // IMPORTANT FIX: Call the parent constructor and pass the primary repository
        // for this service (TeamRepository) so CrudService's $this->repository is initialized.
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
     * Store a new team and associate players.
     *
     * @param array $data
     * @return Team
     * @throws \Exception
     */
    public function store(array $data): Team
    {
        return DB::transaction(function () use ($data) {
            // Prepare team data for creation
            $teamData = [
                'title' => $data['title'],
                'sport_type_id' => $data['sport_type_id'],
                'city_id' => $data['city_id'],
                'gender' => $data['gender'],
                'max_player' => $data['max_player'],
                'min_player' => $data['min_player'],
                'team_status' => 'active',
                'player_count' => count($data['user_ids'] ?? []), // Initial player count
            ];

            // Create the team using the TeamRepository
            $team = $this->teamRepository->create($teamData);
            // Attach players to the team if user_ids are provided
            if (!empty($data['user_ids'])) {
                $playerTeamInsertData = [];
                foreach ($data['user_ids'] as $userId) {
                    $playerTeamInsertData[] = [
                        'id' => Str::uuid()->toString(),
                        'user_id' => $userId,
                        'team_id' => $team->id,
                        'created_at' => now(), // Add timestamps for mass insert
                        'updated_at' => now(), // Add timestamps for mass insert
                    ];
                }
                // Insert player-team relationships using the PlayerTeamRepository
                $this->playerTeamRepository->insert($playerTeamInsertData);
            }

            // Optionally, clear the session for selected players after team creation
            session()->forget('team_create_selected_players');

            return $team;
        });
    }
}
