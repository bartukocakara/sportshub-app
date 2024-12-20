<?php

namespace App\Repositories;

use App\Models\Account;

class AccountRepository extends BaseRepository
{
    protected Account $account;

    /**
     * @param Account $account
     * @return void
    */
    public function __construct(Account $account)
    {
        parent::__construct($account);
        $this->account = $account;
    }
}
