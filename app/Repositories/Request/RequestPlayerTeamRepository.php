<?php

namespace App\Repositories\Request;

use App\Models\RequestPlayerTeam;
use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class RequestPlayerTeamRepository extends BaseRepository
{
    protected RequestPlayerTeam $requestPlayerTeam;

    /**
     * __construct
     *
     * @param  RequestPlayerTeam $requestPlayerTeam
     * @return void
     */
    public function __construct(RequestPlayerTeam $requestPlayerTeam)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestPlayerTeam);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestPlayerTeam = $requestPlayerTeam;
    }
}
