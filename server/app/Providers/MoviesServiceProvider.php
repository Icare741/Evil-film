<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class MoviesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        $this->app->bind(
            \App\Repositories\MoviesRepositoryInterface::class,
            \App\Repositories\MoviesRepository::class
        );

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
