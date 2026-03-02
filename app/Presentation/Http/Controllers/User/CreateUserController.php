<?php

namespace App\Presentation\Http\Controllers\User;

use App\Application\Users\DTO\CreateUserRequest;
use App\Application\Users\UseCase\CreateUserUseCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateUserController
{
    public function __construct(private CreateUserUseCase $createUser)
    {
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:100'],
            'role' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $dto = new CreateUserRequest(
            name: $validated['name'],
            email: $validated['email'],
            role: $validated['role'],
            password: $validated['password']
        );

        $this->createUser->handle($dto);

        return redirect()->route('users.index')
            ->with('status', 'User berhasil dibuat.');
    }
}
