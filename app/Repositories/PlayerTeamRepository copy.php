<?php

namespace App\Repositories\Player;

use App\Models\PlayerTeam;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PlayerTeamRepository extends BaseRepository
{
    protected PlayerTeam $playerTeam;

    /**
     * __construct
     *
     * @param  mixed $test
     * @return void
     */
    public function __construct(PlayerTeam $playerTeam)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($playerTeam);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->playerTeam = $playerTeam;
    }

    public function findByTeamIdArray(array $teamIds): Collection|array
    {
        return $this->playerTeam->whereIn('team_id', $teamIds)->with('team')->get();
    }

    public function findByTeamId( string $userId, string $teamId) : PlayerTeam|null
    {
        return $this->playerTeam->where([
                                            'user_id' => $userId,
                                            'team_id' => $teamId
                                        ])->first();
    }

    public function players(Request $request): LengthAwarePaginator|Collection
    {
        return $this->model->with('player', 'requestPlayerTeam')->filterBy($request->all());
    }

    /**
     * store
     *
     * @param  array $rows
     * @return bool
     */
    public function insert(array $rows) : bool
    {
        return $this->playerTeam->insert($rows);
    }

    // /**
    //  * Bir kaynağı kaldırmak için kullanılır.
    //  *
    //  * @param int $id
    //  * @return bool
    // */
    // public function deleteByParams(array $params) : bool
    // {
    //     $userIds = array_column($params['users'], 'user_id');

    //     return $this->playerTeam->where('team_id', $params['team_id'])
    //         ->whereIn('user_id', $userIds)
    //         ->delete();
    // }

    public function teams(Request $request): LengthAwarePaginator|Collection
    {
        return $this->model->with('team.teamStatus', 'team.users',  'requestPlayerTeam')->filterBy($request->all());
    }

    public function updateByParams(array $value): bool
    {
        $this->model->where('id', $value['id'])
                ->update(['match_team_id' => $value['match_team_id']]);
        return true;
    }

    /**
     * Bir kaynağı kaldırmak için kullanılır.
     *
     * @param int $id
     * @return bool
    */
    public function deleteByParams(array $params) : bool
    {
        return $this->model->whereIn('id', $params['mtp_ids'])
                                     ->delete();
    }
}
