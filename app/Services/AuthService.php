<?php

namespace App\Services;

use App\Interfaces\UserRepositoryInterface;

class AuthService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private PasswordService $passwordService
    ) {
    }

    public function authenticateUser(string $email, string $password): array|bool
    {
        $user = $this->userRepository->getByEmail($email);

        return password_verify($password, $user->password);
    }


}