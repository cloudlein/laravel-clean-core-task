<?php

namespace App\Application\Auth\DTO;

final class RegisterUserRequest
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
    ) {
    }
}
