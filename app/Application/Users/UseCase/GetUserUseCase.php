<?php

namespace App\Application\Users\UseCase;

use App\Domain\Users\UserRepository;

class GetUserUseCase
{
    public function __construct(private UserRepository $users)
    {
    }

    public function getById(int $id): ?object
    {
        return $this->users->findById($id);
    }

    public function getAll(): iterable
    {
        return $this->users->all();
    }
}
