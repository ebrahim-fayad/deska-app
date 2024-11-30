<?php

namespace App\Providers;

use App\Interface\Admin\Auth\AdminAuthRepositoryInterface;
use App\Repository\Admin\Auth\AdminAuthRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $this->app->bind(AdminAuthRepositoryInterface::class, AdminAuthRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
