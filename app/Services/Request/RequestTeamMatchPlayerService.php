<?php

namespace App\Services\Request;

use App\Services\CrudService;
use App\Repositories\Request\RequestTeamMatchPlayerRepository;

class RequestTeamMatchPlayerService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestTeamMatchPlayerRepository $requestTeamMatchPlayerRepository;

    /**
     * @param RequestTeamMatchPlayerRepository $requestTeamMatchPlayerRepository
     * @return void
    */
    public function __construct(RequestTeamMatchPlayerRepository $requestTeamMatchPlayerRepository)
    {
        $this->requestTeamMatchPlayerRepository = $requestTeamMatchPlayerRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestTeamMatchPlayerRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }
}
