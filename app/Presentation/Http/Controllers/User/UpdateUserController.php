<?php

namespace App\Presentation\Http\Controllers\User;

use App\Application\Users\DTO\UpdateUserRequest;
use App\Application\Users\UseCase\GetUserUseCase;
use App\Application\Users\UseCase\UpdateUserUseCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UpdateUserController
{
    public function __construct(
        private GetUserUseCase $getUser,
        private UpdateUserUseCase $updateUser
    ) {
    }

    public function edit(int $id): View
    {
        $user = $this->getUser->getById($id);

        if (! $user) {
            abort(404);
        }

        return view('users.edit', compact('user'));
    }

    public function update(Request $request, int $id): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'role' => ['required', 'string', 'max:50'],
            'password' => ['nullable', 'string', 'min:8'],
        ]);

        $dto = new UpdateUserRequest(
            name: $validated['name'],
            email: $validated['email'],
            role: $validated['role'],
            password: $validated['password'] ?? null
        );

        $this->updateUser->handle($id, $dto);

        return redirect()->route('users.index')
            ->with('status', 'User berhasil diperbarui.');
    }
}
