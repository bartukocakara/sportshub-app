<?php

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class RegisterService extends CrudService
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

    public function registerUser(array $params)
    {
        $user = $this->userRepository->create($params);
        event(new Registered($user));

        Auth::login($user);
    }
}
