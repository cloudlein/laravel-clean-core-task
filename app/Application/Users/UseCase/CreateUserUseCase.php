<?php

namespace App\Application\Users\UseCase;

use App\Application\Users\DTO\CreateUserRequest;
use App\Domain\Users\UserRepository;
use Illuminate\Validation\ValidationException;

class CreateUserUseCase
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(CreateUserRequest $request): object
    {
        $errors = [];

        $existing = $this->users->findByEmail($request->email);

        if ($existing) {
            $errors['email'][] = 'Email sudah terdaftar.';
        }

        if (empty($request->role)) {
            $errors['role'][] = 'Role harus diisi.';
        }

        if (empty($request->name)) {
            $errors['name'][] = 'Nama harus diisi.';
        }

        if (strlen($request->password) < 8) {
            $errors['password'][] = 'Password minimal 8 karakter.';
        }

        if (! empty($errors)) {
            throw ValidationException::withMessages($errors);
        }

        return $this->users->create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => $request->password,
        ]);
    }
}
