<?php

namespace App\Providers;

use App\Interface\Admin\Auth\AdminAuthRepositoryInterface;
use App\Interface\Admin\Auth\AdminForgotPasswordRepositoryInterface;
use App\Interface\Admin\Services\ServicesRepositoryInterface;
use App\Repository\Admin\Auth\AdminAuthRepository;
use App\Repository\Admin\Auth\AdminForgotPasswordRepository;
use App\Repository\Admin\Services\ServicesRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         $this->app->bind(AdminAuthRepositoryInterface::class, AdminAuthRepository::class);
         $this->app->bind(AdminForgotPasswordRepositoryInterface::class, AdminForgotPasswordRepository::class);
         $this->app->bind(ServicesRepositoryInterface::class, ServicesRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
