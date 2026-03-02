<?php

use App\Presentation\Http\Controllers\Auth\RegisterUserController;
use App\Presentation\Http\Controllers\User\CreateUserController;
use App\Presentation\Http\Controllers\User\DeleteUserController;
use App\Presentation\Http\Controllers\User\IndexUserController;
use App\Presentation\Http\Controllers\User\UpdateUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [RegisterUserController::class, 'create'])->name('auth.register.create');
Route::post('/register', [RegisterUserController::class, 'store'])->name('auth.register.store');

Route::get('/users', IndexUserController::class)->name('users.index');

Route::get('/users/create', [CreateUserController::class, 'create'])->name('users.create');
Route::post('/users', [CreateUserController::class, 'store'])->name('users.store');

Route::get('/users/{id}/edit', [UpdateUserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UpdateUserController::class, 'update'])->name('users.update');

Route::delete('/users/{id}', DeleteUserController::class)->name('users.destroy');
