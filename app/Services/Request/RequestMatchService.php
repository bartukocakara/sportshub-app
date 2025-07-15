<?php

namespace App\Services\Request;

use App\Services\CrudService;
use App\Repositories\Request\RequestMatchRepository;

class RequestMatchService extends CrudService
{
    protected RequestMatchRepository $requestMatchRepository;

    public function __construct(RequestMatchRepository $requestMatchRepository)
    {
        $this->requestMatchRepository= $requestMatchRepository;
        parent::__construct($this->requestMatchRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
