<?php

namespace App\Repositories\Request;

use App\Repositories\BaseRepository;
use App\Models\RequestMatchTeamPlayer;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Collection;

class RequestMatchTeamPlayerRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestMatchTeamPlayer $requestMatchTeamPlayer;

    /**
     * @param RequestMatchTeamPlayer $requestMatchTeamPlayer
     * @return void
    */
    public function __construct(RequestMatchTeamPlayer $requestMatchTeamPlayer)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestMatchTeamPlayer);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestMatchTeamPlayer = $requestMatchTeamPlayer;
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return LengthAwarePaginator|Collection
     */
    public function all( Request $request): LengthAwarePaginator|Collection
    {
        return $this->requestMatchTeamPlayer->with(['requestedUser', 'matchTeam.match.matchStatus'])->filterBy($request->all());
    }

    public function insert(array $rows): bool
    {
        return $this->requestMatchTeamPlayer->insert($rows);
    }
}
