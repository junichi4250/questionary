<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Review\ReviewRepository;
use App\Repositories\Review\ReviewRepositoryInterface;
use App\Repositories\Shop\ShopRepository;
use App\Repositories\Shop\ShopRepositoryInterface;
use App\Repositories\Age\AgeRepository;
use App\Repositories\Age\AgeRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReviewRepositoryInterface::class, ReviewRepository::class);
        $this->app->bind(ShopRepositoryInterface::class, ShopRepository::class);
        $this->app->bind(AgeRepositoryInterface::class, AgeRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
