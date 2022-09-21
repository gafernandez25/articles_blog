<?php

namespace App\Services;

class PasswordService
{

    public function hashPassword(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }
}