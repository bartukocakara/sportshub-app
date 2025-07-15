<?php

namespace App\Repositories\Request;

use App\Repositories\BaseRepository;
use App\Models\RequestTeamMatchPlayer;

class RequestTeamMatchPlayerRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestTeamMatchPlayer $requestTeamMatchPlayer;

    /**
     * @param RequestTeamMatchPlayer $requestTeamMatchPlayer
     * @return void
    */
    public function __construct(RequestTeamMatchPlayer $requestTeamMatchPlayer)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestTeamMatchPlayer);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestTeamMatchPlayer = $requestTeamMatchPlayer;
    }
}
