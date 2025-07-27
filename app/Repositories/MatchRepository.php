<?php

namespace App\Repositories;

use App\Enums\TypeEnums\MatchTypeEnum;
use App\Models\Matches;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MatchRepository extends BaseRepository
{
    protected Matches $matches;
    private const FROM_HOUR = '10:00';
    private const TO_HOUR = '24:00';

    /**
     * @param Matches $matches
     * @return void
    */
    public function __construct(Matches $matches)
    {
        parent::__construct($matches);
        $this->matches = $matches;
    }

    /**
     * all
     *
     * @param  Request $request
     * @return LengthAwarePaginator|Collection
     */
    public function all(Request $request, array $with = [], bool $useCache = false): LengthAwarePaginator|Collection
    {
        // // Başlangıç tarihi
        // $fromDate = $request->availability['from_date'] ?? now()->format('Y-m-d');

        // // Bitiş tarihi
        // $toDatePlusOneMonth = now()->parse($fromDate)->addMonth()->format('Y-m-d');

        // // Başlangıç zamanı
        // $fromHour = $request->availability['from_hour'] ?? self::FROM_HOUR;
        // // Bitiş zamanı
        // $toHour = $request->availability['to_hour'] ?? self::TO_HOUR;
        // // Maç tipi
        $type = $request->type ?? MatchTypeEnum::PLAYER->value;
        $query = $this->matches->newQuery();
        if ($type == MatchTypeEnum::PLAYER->value) {
            // dd($query->whereHas('matchTeams')
            // ->with('matchTeams.matchTeamPlayers.user',
            //         'court')
            // ->filterByPlayer($request->all())[0]->matchTeams[0]->matchTeamPlayers[0]->user);
            return $query->whereHas('matchTeams')
                ->with(['matchTeams.matchTeamPlayers.user',
                        'matchOwners',
                        'statusDefinition',
                        'court.courtAddress.district.city'])
                ->filterByPlayer($request->all());
        }
        return $query->whereHas('teamMatches')
            ->with(['teamMatches.team.users',
                    'statusDefinition',
                    'matchOwners',
                    'court.courtAddress.district.city'])
            ->filterByTeam($request->all());
    }
}
