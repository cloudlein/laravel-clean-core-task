<?php

namespace App\Presentation\Http\Controllers\User;

use App\Application\Users\UseCase\GetUserUseCase;
use Illuminate\View\View;

class IndexUserController
{
    public function __construct(private GetUserUseCase $getUser)
    {
    }

    public function __invoke(): View
    {
        $users = $this->getUser->getAll();
        return view('users.index', compact('users'));
    }
}
