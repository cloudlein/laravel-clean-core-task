<?php

namespace App\Domain\Users;

interface UserRepository
{
    public function create(array $attributes): object;

    public function findByEmail(string $email): ?object;
}

