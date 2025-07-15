<?php

namespace App\Services\Request;

use App\Services\CrudService;
use App\Repositories\Request\RequestCourtSubscriptionRepository;

class RequestCourtSubscriptionService extends CrudService
{
    // Crud işlemleri gerekmiyorsa extends'i kaldırınız. //

    protected RequestCourtSubscriptionRepository $requestCourtSubscriptionRepository;

    /**
     * @param RequestCourtSubscriptionRepository $requestCourtSubscriptionRepository
     * @return void
    */
    public function __construct(RequestCourtSubscriptionRepository $requestCourtSubscriptionRepository)
    {
        $this->requestCourtSubscriptionRepository = $requestCourtSubscriptionRepository;
        // Extend ettiğimiz CrudService'in __construct methoduna repositoryi gönderiyoruz.
        parent::__construct($this->requestCourtSubscriptionRepository); // Crud işlemleri yoksa kaldırınız.
        // Repository bu serviste kullanılmak üzere değişkene tanımlanıyor.
    }
}
