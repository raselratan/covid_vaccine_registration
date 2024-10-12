<?php

namespace App\Providers;

use App\Http\Repositories\Contracts\UserRepositoryInterface;
use App\Http\Repositories\Contracts\VenueRepositoryInterface;
use App\Http\Repositories\UserRepository;
use App\Http\Repositories\VenueRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            VenueRepositoryInterface::class,
            VenueRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
