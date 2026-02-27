<?php

use App\Presentation\Http\Controllers\Auth\RegisterUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterUserController::class, 'create'])->name('auth.register.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('auth.register.store');
