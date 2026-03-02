<?php

namespace App\Domain\Users;

interface UserRepository
{
    public function create(array $attributes): object;

    public function findByEmail(string $email): ?object;

    public function findById(int $id): ?object;

    public function update(object $user, array $attributes): bool;

    public function delete(object $user): bool;

    public function all(): iterable;
}

