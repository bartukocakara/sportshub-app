<?php

namespace App\Repositories\Request;

use App\Models\RequestTeamMatch;
use App\Repositories\BaseRepository;

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
}
