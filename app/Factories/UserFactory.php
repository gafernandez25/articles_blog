<?php

namespace App\Factories;

use App\Entites\UserEntity;

class UserFactory
{
    public static function create(array $userData)
    {
        return new UserEntity(
            $userData->id,
            $userData->email,
            $userData->first_name,
            $userData->last_name
        );
    }

}