<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\DTO\LoginUserRequest;
use App\Application\Auth\UseCase\LoginUserUseCase;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginUserController
{
    public function __construct(private LoginUserUseCase $loginUser)
    {
    }

    public function create(): View {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $dto = new LoginUserRequest(
            email: $validated['email'],
            password: $validated['password']
        );

        $user = $this->loginUser->handle($dto);

        Auth::login($user);

        return redirect('/')
            ->with('status', 'User '.$user->id.' berhasil terdaftar');

    }

}
