<?php

namespace App\Providers;

use App\Domain\Users\UserRepository;
use App\Infrastructure\Persistence\Eloquent\Users\Users\EloquentUserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(UserRepository::class, EloquentUserRepository::class);
    }

    public function boot(): void
    {
    }
}
