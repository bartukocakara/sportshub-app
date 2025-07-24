<?php

namespace App\Services\Api;

use App\Services\CrudService;
use App\Repositories\UserRepository;

class UserService extends CrudService
{
    protected UserRepository $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        parent::__construct($this->userRepository); // Crud işlemleri yoksa kaldırınız.
    }
}
