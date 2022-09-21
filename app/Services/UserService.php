<?php

namespace App\Services;

use App\Entities\UserEntity;
use App\Interfaces\UserRepositoryInterface;

class UserService
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function getById(int $id): ?UserEntity
    {
        $user = $this->userRepository->getById($id);

        if (!$user) {
            throw new \Exception("User does not exist");
        }

        return new UserEntity(
            $user->id,
            $user->email,
            $user->first_name,
            $user->last_name,
        );
    }
}