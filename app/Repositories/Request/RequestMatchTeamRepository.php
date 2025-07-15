<?php

namespace App\Repositories\Request;

use App\Models\RequestMatchTeam;
use App\Repositories\BaseRepository;

class RequestMatchTeamRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestMatchTeam $requestMatchTeam;

    /**
     * @param RequestMatchTeam $requestMatchTeam
     * @return void
    */
    public function __construct(RequestMatchTeam $requestMatchTeam)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestMatchTeam);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestMatchTeam = $requestMatchTeam;
    }
}
