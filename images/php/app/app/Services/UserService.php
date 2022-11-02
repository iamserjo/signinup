<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserService
{
    public function find($id): User
    {
        return User::find($id)->first();
    }

    public function create($firstName, $lastName, $email, $phone, $password) : User
    {
        return User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'password' => Hash::make($password),
        ]);
    }

}
