<?php

namespace App\Infrastructure\Persistence\Eloquent\Users;

use App\Domain\Users\UserRepository;
use App\Models\User;

class EloquentUserRepository implements UserRepository
{
    public function create(array $attributes): object
    {
        return User::create($attributes);
    }

    public function findByEmail(string $email): ?object
    {
        return User::where('email', $email)->first();
    }
}
