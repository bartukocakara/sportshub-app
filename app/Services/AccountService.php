<?php

namespace App\Services;

use App\Repositories\AccountRepository;

class AccountService extends CrudService
{
    protected AccountRepository $accountRepository;

    /**
     * @param AccountRepository $accountRepository
     * @return void
    */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
        parent::__construct($this->accountRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
