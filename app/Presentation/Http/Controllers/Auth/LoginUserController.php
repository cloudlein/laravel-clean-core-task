<?php

namespace App\Presentation\Http\Controllers\Auth;

use App\Application\Auth\LoginUser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginUserController
{
    public function __construct(private LoginUser $loginUser)
    {
    }

    public function create(): View {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse {
        $validated = $request->validate([

        ])
    }

}
