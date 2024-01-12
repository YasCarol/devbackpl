<?php

namespace App\Services;

use App\DTOs\User\CreateUserDTO;
use App\Repositories\User\UserRepository;

class UserService
{

    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository;
    }

    public function newUser(CreateUserDTO $dto)
    {
        return $this->userRepository->create($dto);
    }
}
