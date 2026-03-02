<?php

namespace App\Application\Users\UseCase;

use App\Application\Users\DTO\UpdateUserRequest;
use App\Domain\Users\UserRepository;
use Illuminate\Validation\ValidationException;

class UpdateUserUseCase
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(int $id, UpdateUserRequest $request): object
    {
        $user = $this->users->findById($id);

        if (! $user) {
            throw ValidationException::withMessages([
                'id' => ['User tidak ditemukan.'],
            ]);
        }

        $errors = [];

        // Cek email kembar kalau email berubah
        if ($request->email !== $user->email) {
            $existing = $this->users->findByEmail($request->email);
            if ($existing) {
                $errors['email'][] = 'Email sudah terdaftar.';
            }
        }

        if (empty($request->role)) {
            $errors['role'][] = 'Role harus diisi.';
        }

        if (empty($request->name)) {
            $errors['name'][] = 'Nama harus diisi.';
        }

        if ($request->password && strlen($request->password) < 8) {
            $errors['password'][] = 'Password minimal 8 karakter.';
        }

        if (! empty($errors)) {
            throw ValidationException::withMessages($errors);
        }

        $attributes = [
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ];

        if ($request->password) {
            $attributes['password'] = $request->password;
        }

        $this->users->update($user, $attributes);

        return $user;
    }
}
