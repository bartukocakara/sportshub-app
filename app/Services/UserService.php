<?php

namespace App\Services;

use App\Repositories\UserRepository;

class UserService extends CrudService
{
    protected UserRepository $userRepository;

    /**
     * @param UserRepository $userRepository
     * @return void
    */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct($this->userRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
