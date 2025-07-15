<?php

namespace App\Repositories;

use App\Models\TeamMatch;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class TeamMatchRepository extends BaseRepository
{
    protected TeamMatch $teamMatch;

    /**
     * __construct
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(TeamMatch $teamMatch)
    {
        parent::__construct($teamMatch);
        $this->teamMatch= $teamMatch;
    }

    public function matches(Request $request) : LengthAwarePaginator|Collection
    {
        return $this->teamMatch
            ->with([
                'teamLeaders.user',
                'matchOwner.user',
                'teams.users',
                'match.court.courtImage',
                'match.matchStatus',
                'requestTeamMatches.requestTeamMatchStatus'
            ])
            ->filterBy($request->all());
    }

    /**
     * Yeni oluşturulan bir kaynağı database katmanına kaydeder.
     *
     * @param array $data
     * @return Model
    */
    public function attach(array $datas) : bool
    {
        foreach ($datas['team_ids'] as $key => $value) {
            $insert[] = [
                'id' => Str::uuid()->toString(),
                'team_id' => $value,
                'match_id' => $datas['match_id']
            ];
        }
        return $this->model->insert($insert);
    }
}
