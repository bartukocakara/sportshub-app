<?php

namespace App\Aggregates\Match;

use App\Enums\Request\RequestStatusEnum;
use App\Enums\TypeEnums\MatchTypeEnum;
use App\Enums\TypeEnums\RequestTypeEnum;
use App\Jobs\SendMailJob;
// use App\Models\MatchCourtWishlist;
use App\Models\Matches;
use App\Models\MatchTeam;
use App\Models\RequestMatchTeamPlayer;
use App\Models\RequestTeamMatchPlayer;
use App\Models\Team;
use App\Models\TeamMatch;
use App\Models\User;
use App\Repositories\MatchRepository;
use App\Repositories\TeamRepository;
// use App\Repositories\Match\MatchCourtWishlistRepository;
use App\Repositories\MatchTeamRepository;
use App\Repositories\TeamMatchRepository;
use App\Repositories\Request\RequestMatchTeamPlayerRepository;
use App\Repositories\Request\RequestTeamMatchPlayerRepository;
use App\Repositories\UserRepository;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MatchAggregate
{
    protected MatchRepository $matchRepository;

    private  $fillableFields = [
        'match_status_id',
        'sport_type_id',
        'title',
        'description',
        'max_player',
        'min_player',
        'max_team',
        'min_team',
        'gender',
        'from_hour',
        'to_hour',
        'start_date',
        'expiring_date',
        'play_date',
        'type'
    ];

    public function __construct(
        MatchRepository $matchRepository,
    ) {
        $this->matchRepository = $matchRepository;
    }

    public function createMatch(array $data): Model
    {
        DB::beginTransaction();

        try {
            $fillableData = array_intersect_key($data, array_flip($this->fillableFields));
            # 1 Create match
            $match = $this->matchRepository->create($fillableData);
            $data['match_id'] = $match->id;
            $matchType = intval($data['type']);

            # 4 Insert match teams
            # 5 Insert match team players and request match team players
            if ($matchType === MatchTypeEnum::PLAYER->value) {
                $data = $this->insertMatchTeams($data, $match);
                $this->insertRequestMatchTeamPlayers($data, $match);
            } elseif ($matchType === MatchTypeEnum::TEAM->value) {
                $data = $this->insertTeamMatches($data, $match);
                $this->insertRequestTeamMatchPlayers($data);
            }

            # 6 Create the request court
            $this->insertCourtWishlist($data, $match);

            DB::commit();

            return $match;
        } catch (\Exception $e) {
            // An error occurred, rollback the transaction
            DB::rollBack();
            throw $e; // Re-throw the exception after rolling back
        }
    }

    public function insertMatchTeams(array $data, Model $match): array
    {
        $matchTeamRows = [];
        foreach($data['teams'] as $key => $value) {
            $matchTeamId = Str::uuid()->toString();
            $matchTeamRows[] = [
                'id' => $matchTeamId,
                'title' => $value['title'],
                'match_id' => $match->id,
            ];
            $data['teams'][$key]['id'] = $matchTeamId;
        }
        (new MatchTeamRepository(new MatchTeam))->insert($matchTeamRows);

        return $data;
    }

    public function insertTeamMatches(array $data, Model $match): array
    {
        $teams = (new TeamRepository(new Team()))->findByTeamIdArray($data['team_ids']);
        foreach($teams as $key => $value) {
            $teamMatch = (new TeamMatchRepository(new TeamMatch()))->create([
                'team_id' => $value->id,
                'match_id' => $match->id,
            ]);
            $data['teams'][$key] = [
                'team_match_id' => $teamMatch->id,
                'user_ids' => $value->users->pluck('id')->toArray()
            ] ;
        }
        return $data;
    }

    /**
     * insertRequestMatchTeamPlayers
     *
     * @param  array $data
     * @return void
     */
    public function insertRequestMatchTeamPlayers(array $data, Matches $match): void
    {
        $insertRequestMatchTeamPlayerRows = [];
        $userIds = [];
        foreach($data['teams'] as $value) {
            foreach($value['user_ids'] as $v) {
                $insertRequestMatchTeamPlayerRows[] = [
                    'id' => Str::uuid()->toString(),
                    'requested_user_id' => $v,
                    'match_team_id' => $value['id'],
                    'status' => RequestStatusEnum::WAITING_FOR_APPROVAL->value,
                    'type' => RequestTypeEnum::INVITE->value,
                    'title' => $data['request_player_message']
                ];
                $userIds[] = $v;
            }
        }
        (new RequestMatchTeamPlayerRepository(new RequestMatchTeamPlayer()))->insert($insertRequestMatchTeamPlayerRows);
        $users = (new UserRepository(new User()))->getByIds($userIds);
        foreach ($users as $user) {
            $emailData = [
                'to' => [$user->email],
                'player_name' => $user->fullName,
                'match_details' => $this->generateMatchDetailsText($data),
                'invite_link' => $this->generateApprovalLink($data['invite_link'], $match->id),
            ];

            // SendMailJob::dispatch(
            //     $emailData,
            //     $user,
            //     'MatchInviteRequest'
            // );
        }
    }

    /**
     * insertRequestTeamMatchPlayers
     *
     * @param  array $data
     * @return void
     */
    public function insertRequestTeamMatchPlayers(array $data): void
    {
        $insertRequestTeamMatchPlayerRows = [];
        foreach($data['teams'] as $value) {
            foreach($value['user_ids'] as $v) {
                $id = Str::uuid()->toString();

                $insertRequestTeamMatchPlayerRows[] = [
                    'id' => Str::uuid()->toString(),
                    'requested_user_id' => $v,
                    'team_match_id' => $id,
                    'type' => RequestTypeEnum::INVITE->value,
                    'title' => $data['request_player_message']
                ];
            }
        }
        (new RequestTeamMatchPlayerRepository(new RequestTeamMatchPlayer()))->insert($insertRequestTeamMatchPlayerRows);
    }

    /**
     * insertCourtWishlist
     *
     * @param  array $data
     * @param  Model $match
     * @return void
     */
    protected function insertCourtWishlist(array $data, Model $match) : void
    {
        $insertCourtWishlistRows = [];
        foreach ($data['court_wishlists'] as $value) {
            $insertCourtWishlistRows[] = [
                'id' => Str::uuid()->toString(),
                'user_id' => auth()->user()->id,
                'match_id' => $match->id,
                'court_id' => $value,
                'title' => $data['request_court_message'],
            ];
        }
        // (new MatchCourtWishlistRepository(new MatchCourtWishlist()))->insert($insertCourtWishlistRows);
    }

    function generateMatchDetailsText(array $data): string
    {

        $courts = implode(', ', $data['court_wishlists']);

        return <<<DETAILS
    Match Title: {$data['title']}
    Description: {$data['description']}
    Sport Type: {$data['sport_type']}
    Date: {$data['play_date']}
    Time: {$data['from_hour']} - {$data['to_hour']}
    Court Wishlist: {$courts}
    DETAILS;
    }

    function generateApprovalLink(string $inviteLinkTemplate, int $matchId): string
    {
        return str_replace('{id}', $matchId, $inviteLinkTemplate);
    }

}
