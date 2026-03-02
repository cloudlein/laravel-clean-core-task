<?php

namespace App\Application\Auth\DTO;

class LoginUserRequest
{
    public function __construct(
        public string $email,
        public string $password,
    )
    {
    }
}
