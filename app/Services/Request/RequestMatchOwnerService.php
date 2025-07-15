<?php

namespace App\Services\Request;

use App\Services\CrudService;
use App\Repositories\Request\RequestMatchOwnerRepository;

class RequestMatchOwnerService extends CrudService
{
    protected RequestMatchOwnerRepository $requestMatchOwnerRepository;

    public function __construct(RequestMatchOwnerRepository $requestMatchOwnerRepository)
    {
        $this->requestMatchOwnerRepository = $requestMatchOwnerRepository;
        parent::__construct($this->requestMatchOwnerRepository); // Crud işlemleri yoksa kaldırınız.
    }

}
