<?php

namespace App\Repositories;

use App\Models\Admin;

class AdminRepository extends BaseRepository
{
    protected Admin $admin;

    /**
     * @param Admin $admin
     * @return void
    */
    public function __construct(Admin $admin)
    {
        parent::__construct($admin);
        $this->admin = $admin;
    }
}
