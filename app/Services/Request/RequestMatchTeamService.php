<?php

namespace App\Services\Request;

use App\Services\CrudService;
use App\Repositories\Request\RequestMatchTeamRepository;

class RequestMatchTeamService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestMatchTeamRepository $requestMatchTeamRepository;

    /**
     * @param RequestMatchTeamRepository $requestMatchTeamRepository
     * @return void
    */
    public function __construct(RequestMatchTeamRepository $requestMatchTeamRepository)
    {
        $this->requestMatchTeamRepository = $requestMatchTeamRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestMatchTeamRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }
}
