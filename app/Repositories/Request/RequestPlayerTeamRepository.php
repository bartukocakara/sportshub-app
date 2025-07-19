<?php

namespace App\Repositories\Request;

use App\Models\RequestPlayerTeam;
use App\Repositories\BaseRepository;

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
