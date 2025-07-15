<?php

namespace App\Services\Request;

use App\Repositories\Request\RequestReceiverRepository;
use App\Services\CrudService;

class RequestReceiverService extends CrudService
{
    protected RequestReceiverRepository $requestReceiverRepository;

    /**
     * @param RequestReceiverRepository $requestReceiverRepository
     * @return void
    */
    public function __construct(RequestReceiverRepository $requestReceiverRepository)
    {
        $this->requestReceiverRepository = $requestReceiverRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestReceiverRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }
}
