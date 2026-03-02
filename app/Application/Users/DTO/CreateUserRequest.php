<?php

namespace App\Application\Users\DTO;

class CreateUserRequest
{
    public function __construct(
        public String $name,
        public String $email,
        public String $role,
        public String $password,
    ){}
}
