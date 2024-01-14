<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\Users\UserRepositoryInterface; 
use App\Repository\Users\UserRepository;
use App\Interfaces\Categories\CategoryRepositoryInterface; 
use App\Repository\Categories\CategoryRepository;
use App\Interfaces\Movies\MovieRepositoryInterface; 
use App\Repository\Movies\MovieRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(MovieRepositoryInterface::class, MovieRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
