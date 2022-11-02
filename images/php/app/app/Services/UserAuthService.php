<?php

namespace App\Services;

use App\Models\User;

class UserAuthService
{

    public function __construct(private readonly UserService $userService)
    {
        //
    }

    public function register(string $firstName, string $lastName, string $email, string $phone, string $password): User
    {
        return $this->userService->create(
            firstName: $firstName,
            lastName: $lastName,
            email: $email,
            phone: $phone,
            password: $password,
        );
    }
}
