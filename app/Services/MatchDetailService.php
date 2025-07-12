<?php

namespace App\Services;

use App\Http\Resources\ActivityResource;
use App\Http\Resources\AnnouncementResource;
use App\Http\Resources\MatchResource;
use App\Http\Resources\MatchTeamResource;
use App\Http\Resources\TeamResource;
use App\Models\Activity;
use App\Models\Announcement;
use App\Models\Matches;
use App\Models\MatchTeam;
use App\Models\Team;
use App\Repositories\ActivityRepository;
use App\Repositories\AnnouncementRepository;
use App\Repositories\CityRepository;
use App\Repositories\SportTypeRepository;
use App\Repositories\TeamRepository;
use App\Repositories\MatchRepository;
use App\Repositories\MatchTeamRepository;
use Illuminate\Http\Request;

class MatchDetailService extends CrudService
{
    protected MatchRepository $matchRepository;
    protected CityRepository $cityRepository; // You might need these later, but for now, we'll focus on Match
    protected SportTypeRepository $sportTypeRepository; // You might need these later

    /**
     * @param MatchRepository $matchRepository
     * @param CityRepository $cityRepository // Inject if you need them
     * @param SportTypeRepository $sportTypeRepository // Inject if you need them
     * @return void
     */
    public function __construct(
        MatchRepository $matchRepository
    )
    {
        $this->matchRepository = $matchRepository;
        // $this->cityRepository = $cityRepository; // Uncomment if needed
        // $this->sportTypeRepository = $sportTypeRepository; // Uncomment if needed

        parent::__construct($this->matchRepository); // Keep if Crud operations are handled here
    }

    /**
     * Get match profile data.
     *
     * @param string $matchId
     * @return mixed
     */
    public function getMatchProfileData(string $matchId):array
    {
        $datas['match'] = MatchResource::make($this->matchRepository->find($matchId));
        return $datas;
    }

    /**
     * Get match's teams data.
     *
     * @param string $matchId
     * @return array
     */
    public function getMatchTeamsData(Request $request, string $matchId): array
    {
        $request->merge(['match_id' => $matchId]);
        $datas['match_teams'] = MatchTeamResource::collection((new MatchTeamRepository(new MatchTeam()))->all($request, ['matchTeamPlayers.user'], false))->response()->getData(true);

        return $datas;
    }

    /**
     * Get match's activities data.
     *
     * @param Request $request
     * @param string $matchId
     * @return array
     */
    public function getMatchActivitiesData(Request $request, string $matchId): array
    {
        // $request->merge(['camatch_id' => $matchId]);
        $relations = ['subject'];
        $datas['activities'] = ActivityResource::collection((new ActivityRepository(new Activity()))->all($request, $relations, false))->response()->getData(true);
        return $datas;
    }

    /**
     * Get match's announcements data.
     *
     * @param Request $request
     * @param string $matchId
     * @return array
     */
    public function getMatchAnnouncementsData(Request $request, string $matchId): array
    {
        // $request->merge(['created_match_id' => $matchId]);

        $request->merge([
            'subject_type' => 'Matches',
            'subject_id' => $matchId,
        ]);
        $datas['announcements'] = AnnouncementResource::collection((new AnnouncementRepository(new Announcement()))->all($request, ['user'], false))->response()->getData(true);
        return $datas;
    }
}
