<?php

namespace App\Repositories\Request;

use App\Models\RequestTeamMatch;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

class RequestTeamMatchRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestTeamMatch $requestTeamMatch;

    /**
     * @param RequestTeamMatch $requestTeamMatch
     * @return void
    */
    public function __construct(RequestTeamMatch $requestTeamMatch)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestTeamMatch);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestTeamMatch = $requestTeamMatch;
    }

    /**
     * all
     *
     * @param  Request $request
     * @return LengthAwarePaginator|Collection
     */
    public function all(Request $request): LengthAwarePaginator|Collection
    {
        return $this->requestTeamMatch->with(['requestedUser', 'requestedTeam', 'match'])->filterBy($request->all());
    }
}
