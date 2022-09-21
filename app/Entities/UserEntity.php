<?php

namespace App\Entites;

class UserEntity
{
    public function __construct(
        private int $id,
        private string $email,
        private string $firstName,
        private string $lastName,
    ) {
    }
}