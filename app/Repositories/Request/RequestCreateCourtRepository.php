<?php

namespace App\Repositories\Request;

use App\Models\RequestCreateCourt;
use App\Repositories\BaseRepository;

class RequestCreateCourtRepository extends BaseRepository
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestCreateCourt $requestCreateCourt;

    /**
     * @param RequestCreateCourt $requestCreateCourt
     * @return void
    */
    public function __construct(RequestCreateCourt $requestCreateCourt)
    {
        // Ortak crud işlemleri için BaseRepository construct'ına model gönderiliyor.
        parent::__construct($requestCreateCourt);
        // Model bu repoda kullanılmak üzere değişkene tanımlanıyor.
        $this->requestCreateCourt = $requestCreateCourt;
    }
}
