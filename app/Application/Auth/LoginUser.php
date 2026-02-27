<?php

namespace App\Application\Auth;

use App\Application\Auth\DTO\LoginUserData;
use App\Domain\Users\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginUser
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(LoginUserData $data): ?object
    {
        $user = $this->users->findByEmail($data->email);

        if (! $user || ! Hash::check($data->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        Auth::login($user);

        return $user;
    }
}
