<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTO\RegisterUserRequest;
use App\Domain\Users\UserRepository;

class RegisterUserUseCase
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(RegisterUserRequest $data): object
    {
        return $this->users->create([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
        ]);
    }
}
