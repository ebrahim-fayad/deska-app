<?php

namespace App\Providers;

use App\Interface\Admin\Auth\AdminAuthRepositoryInterface;
use App\Interface\Admin\Auth\AdminForgotPasswordRepositoryInterface;
use App\Interface\Admin\Features\FeaturesRepositoryInterface;
use App\Interface\Admin\Members\MembersRepositoryInterface;
use App\Interface\Admin\Messages\MessagesRepositoryInterface;
use App\Interface\Admin\Services\ServicesRepositoryInterface;
use App\Interface\Admin\Testmonials\TestmonialsRepositoryInterface;
use App\Repository\Admin\Auth\AdminAuthRepository;
use App\Repository\Admin\Auth\AdminForgotPasswordRepository;
use App\Repository\Admin\Features\FeaturesRepository;
use App\Repository\Admin\Members\MembersRepository;
use App\Repository\Admin\Messages\MessagesRepository;
use App\Repository\Admin\Services\ServicesRepository;
use App\Repository\Admin\Testmonials\TestmonialsRepository;
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
         $this->app->bind(FeaturesRepositoryInterface::class, FeaturesRepository::class);
         $this->app->bind(MessagesRepositoryInterface::class, MessagesRepository::class);
         $this->app->bind(TestmonialsRepositoryInterface::class, TestmonialsRepository::class);
         $this->app->bind(MembersRepositoryInterface::class, MembersRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
