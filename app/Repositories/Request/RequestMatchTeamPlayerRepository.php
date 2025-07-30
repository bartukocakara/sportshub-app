<?php

namespace App\Repositories\Request;

use App\Repositories\BaseRepository;
use App\Models\RequestMatchTeamPlayer;

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
}
