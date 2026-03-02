<?php

namespace App\Presentation\Http\Controllers\User;

use App\Application\Users\UseCase\DeleteUserUseCase;
use Illuminate\Http\RedirectResponse;

class DeleteUserController
{
    public function __construct(private DeleteUserUseCase $deleteUser)
    {
    }

    public function __invoke(int $id): RedirectResponse
    {
        $this->deleteUser->handle($id);

        return redirect()->route('users.index')
            ->with('status', 'User berhasil dihapus.');
    }
}
