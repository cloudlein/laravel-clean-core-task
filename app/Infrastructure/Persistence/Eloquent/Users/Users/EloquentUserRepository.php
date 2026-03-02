<?php

namespace App\Infrastructure\Persistence\Eloquent\Users\Users;

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

    public function findById(int $id): ?object
    {
        return User::find($id);
    }

    public function update(object $user, array $attributes): bool
    {
        return $user->update($attributes);
    }

    public function delete(object $user): bool
    {
        return $user->delete();
    }

    public function all(): iterable
    {
        return User::all();
    }
}
