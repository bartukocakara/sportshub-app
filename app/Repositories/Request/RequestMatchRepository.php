<?php

namespace App\Repositories\Request;

use App\Models\RequestMatch;
use App\Repositories\BaseRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RequestMatchRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestMatch $requestMatch;

    /**
     * @param Court $report
     * @return void
    */
    public function __construct(RequestMatch $requestMatch)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestMatch);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestMatch = $requestMatch;
    }

    /**
     * all
     *
     * @param  mixed $request
     * @return LengthAwarePaginator|Collection
     */
    public function all( Request $request): LengthAwarePaginator|Collection
    {
        $query = $this->requestMatch->with(['requestedUser']);

        // Check if requested_user_id exists in the request parameters
        if (!$request->has('requested_user_id')) {
            $query->with([
                // Load these relations only when requested_user_id exists
                'match.matchTeams.matchTeamPlayers.user',
                'match.matchTeams.matchTeamPlayers.status',
            ]);
        }
        return $query->filterBy($request->all());
    }

    /**
     * Bir kaynağı görüntülemek için kullanılır.
     *
     * @param int $id
     * @return RequestMatch
    */
    public function find(int|string $id) : RequestMatch
    {
        return $this->model->findOrFail($id);
    }
}
