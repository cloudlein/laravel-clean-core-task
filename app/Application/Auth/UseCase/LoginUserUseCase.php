<?php

namespace App\Application\Auth\UseCase;

use App\Application\Auth\DTO\LoginUserRequest;
use App\Domain\Users\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUserUseCase
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(LoginUserRequest $data): User
    {
        $user = $this->users->findByEmail($data->email);

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw new InvalidCredentialsException();
        }

        return $user;
    }
}
