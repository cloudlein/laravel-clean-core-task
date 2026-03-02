<?php

namespace App\Application\Users\UseCase;

use App\Domain\Users\UserRepository;
use Illuminate\Validation\ValidationException;

class DeleteUserUseCase
{
    public function __construct(private UserRepository $users)
    {
    }

    public function handle(int $id): bool
    {
        $user = $this->users->findById($id);

        if (! $user) {
            throw ValidationException::withMessages([
                'id' => ['User tidak ditemukan.'],
            ]);
        }

        // Contoh validasi bisnis: tidak boleh hapus diri sendiri (nanti butuh context user yang login)
        // atau validasi lain

        return $this->users->delete($user);
    }
}
