<?php

namespace App\Application\Auth\DTO;

class LoginUserData
{
    public function __construct(
        public string $email,
        public string $password,
    )
    {
    }
}
