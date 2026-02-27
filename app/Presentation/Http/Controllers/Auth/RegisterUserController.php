<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\DTO\RegisterUserData;
use App\Application\Auth\RegisterUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterUserController
{
    public function __construct(private RegisterUser $registerUser)
    {
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $dto = new RegisterUserData(
            name: $validated['name'],
            email: $validated['email'],
            password: $validated['password'],
        );

        $user = $this->registerUser->handle($dto);

        return redirect('/')
            ->with('status', 'User '.$user->id.' berhasil terdaftar');
    }


}
