<?php

namespace App\Application\Auth;

use App\Application\Auth\DTO\RegisterUserData;
use App\Domain\Users\UserRepository;

class RegisterUser
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(RegisterUserData $data): object
    {
        return $this->users->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ]);
    }
}
