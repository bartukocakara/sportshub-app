<?php

namespace App\Services;

use App\Repositories\AdminRepository;

class AdminService extends CrudService
{
    protected AdminRepository $adminRepository;

    /**
     * @param AdminRepository $adminRepository
     * @return void
    */
    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
        parent::__construct($this->adminRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
